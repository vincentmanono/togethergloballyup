<?php

namespace App\Http\Controllers;

use App\User;
use App\Wallet;
use App\Payment;
use App\Withdraw;
use Illuminate\Http\Request;
use App\payment\MpesaGateway;
use App\payment\WithdrawCharges;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WalletController extends Controller
{
    public function deposite(Request $request, MpesaGateway $mpesa)
    {
        request()->validate(array(
            'phone' => 'required|numeric',
        ));
        $phone = $request->phone;
        $amount = $request->amount;


        try {
            $response =   $mpesa->wallet($phone, $amount,"Deposit Wallet","https://togethergloballyup.com/api/handle-deposite-result");
            $wallet = Wallet::where('user_id', auth()->user()->id)->first();
            $wallet->payments()->create([
                'user_id' => Auth::user()->id,
                'merchantRequestID' => $response['MerchantRequestID'],
                'checkoutRequestID' => $response['CheckoutRequestID'],
                'responseCode' => $response['ResponseCode'],
                'responseDescription' => $response['ResponseDescription'],
                'customerMessage' => $response['CustomerMessage'],
                'phoneNumber' => $phone,
                'amount' => $amount,
            ]);
            return back()->with('success', $response['CustomerMessage']);
        } catch (\Throwable $th) {
            return  back()->with('error', $response['errorMessage']);
        }
    }

    public function handle_result(Request $request)
    {
        $data = $request->all();
        $data = $data['Body']['stkCallback'];
        $result = Payment::where('checkoutRequestID', $data['CheckoutRequestID'])->where('active', true)->first();
        $result->active = false;
        $result->result = json_encode($data);
        $result->save();

        if ($result == null || $result->merchantRequestID != $data['MerchantRequestID'])
            return null;
        $result->resultCode = $data['ResultCode'];
        $result->resultDesc = $data['ResultDesc'];
        $result->save();
        if ($result->resultCode == 0) {
            $items = $data['CallbackMetadata']['Item'];
            foreach ($items as $item) {
                if ($item['Name'] == 'Amount' && array_key_exists('Value', $item))
                    $result->amount = $item['Value'];
                elseif ($item['Name'] == 'MpesaReceiptNumber' && array_key_exists('Value', $item))
                    $result->mpesaReceiptNumber = $item['Value'];
                elseif ($item['Name'] == 'Balance' && array_key_exists('Value', $item))
                    $result->balance = $item['Value'];
                elseif ($item['Name'] == 'TransactionDate' && array_key_exists('Value', $item))
                    $result->transactionDate = date('Y-m-d H:i:s', strtotime($item['Value']));
            }
            if ($result->save()) {
                $user = User::find($result->user_id);

                $deposited_at = now()->format('Y-m-d H:i:s');

                $wallet = Wallet::where('user_id', $user->id)->first();

                $wallet->amount  += $result->amount;
                $wallet->deposite_at = $deposited_at;
                $wallet->save();
            }
        }
    }

    public function mywallet()
    {
        $user = auth()->user();
        return view('users.wallet.index', compact('user'));
    }

    public function withdraw(Request $request, MpesaGateway $mpesaGateway, WithdrawCharges $withdrawCharges)
    {
        request()->validate(array(
            'amountW' => 'required|numeric|min:10|max:70000',
        ));
        $phone = auth()->user()->phone;
        $amount = $request->amountW;
        $user = auth()->user();
        $user= User::where('id',$user->id)->first();
        $wallet = Wallet::where('user_id', auth()->user()->id)->first();
        if ($wallet->amount < $amount) {
            $request->session()->flash('error', "You have insufficient balance. Your current balance is KES " . $user->wallet->amount);
            return back();
        } else {

            try {

                //newamount =  amount - withdrawcharges
                $wcharges =  $withdrawCharges->MpesachargesAmount($amount);

                if ( $wallet->amount < ($amount + $wcharges) ) {
                    $request->session()->flash('error', "You have insufficient balance in your wallet to cater transaction fee of ". $wcharges ."  Your current balance is KES " . $user->wallet->amount);
                    return back();
                }
                //deduct withdraw charges and amount from user wallect acc
                $wallet->amount -=  ($amount + $wcharges) ;
                $wallet->save();

                //sending withdraw changes amount to info@togethergloballyup.com wallet
                $deposited_at = now()->format('Y-m-d H:i:s');
                $infoAcc = User::where('email','info@togethergloballyup.com')->first();
                $infoWallet = Wallet::where('user_id',$infoAcc->id)->first();
                $infoWallet->amount += $wcharges;
                $infoWallet->deposite_at = $deposited_at ;
                $infoWallet->save();

                $withdraw =   $user->withdraws()->create(
                    [
                        'amount'=> $amount ,
                        'confirmed'=> false

                    ]
                ) ;
                if ( $withdraw) {
                   $request->session()->flash('success',"You will receive your withdraw amount within 24 hours" );
                   return back();
                } else {
                    $request->session()->flash('error', "Error occurred");
                    return back();
                }


                /*

                $response = $mpesaGateway->withdraw($phone, $amount);

                Withdraw::create([
                    'user_id' => Auth::user()->id,
                    'ConversationID' => $response['ConversationID'],
                    'OriginatorConversationID' => $response['OriginatorConversationID'],
                    'ResponseCode' => $response['ResponseCode'],
                    'ResponseDescription' => $response['ResponseDescription'],
                    'amount' => $amount,
                ]);

                return back()->with('success', $response['ResponseDescription']); */


            } catch (\Throwable $th) {
                return  back()->with('error', "contact admin for help");
            }
        }
    }

    public function withdrawConfirm($id)
    {
        $withdraw = Withdraw::findOrFail($id);
        $withdraw->confirmed  = true ;
        $withdraw->save();
        Session::flash('success',"Withdrawal confirmed");
        return back();


    }

    public function withdraw_result(Request $request)
    {
        $data = $request->all();
        $data = $data['result'];
        $result = Withdraw::where('ConversationID', $data['ConversationID'])->first();
        $result->result = json_encode($data);
        $result->save();

        if ($result->ResultCode == 0) {
            $items = $data['ResultParameters']['ResultParameter'];
            foreach ($items as $item) {
                if ($item['key'] == 'TransactionAmount' && array_key_exists('Value', $item))
                    $result->amount = $item['Value'];
                elseif ($item['key'] == 'TransactionReceipt' && array_key_exists('Value', $item))
                    $result->TransactionID = $item['Value'];
                elseif ($item['key'] == 'ReceiverPartyPublicName' && array_key_exists('Value', $item))
                    $result->ReceiverPartyPublicName = $item['Value'];
                elseif ($item['key'] == 'TransactionCompletedDateTime' && array_key_exists('Value', $item))
                    $result->TransactionCompletedDateTime = date('Y-m-d H:i:s', strtotime($item['Value']));
            }
            $result->save();
        }
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function show(Wallet $wallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function edit(Wallet $wallet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wallet $wallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wallet $wallet)
    {
        //
    }
}
