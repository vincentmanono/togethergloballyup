<?php

namespace App\Http\Controllers;

use App\User;
use App\Wallet;
use App\Payment;
use Illuminate\Http\Request;
use App\payment\MpesaGateway;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function deposite(Request $request , MpesaGateway $mpesa)
    {
        request()->validate(array(
            'phone' => 'required|numeric',
        ));
        $phone = $request->phone ;
        $amount = $request->amount ;
      $response =   $mpesa->wallet($phone,$amount);

      $result = Payment::create([
        'user_id' => Auth::user()->id,
        'merchantRequestID' => $response['MerchantRequestID'],
        'checkoutRequestID' => $response['CheckoutRequestID'],
        'responseCode' => $response['ResponseCode'],
        'responseDescription' => $response['ResponseDescription'],
        'customerMessage' => $response['CustomerMessage'],
        'phoneNumber' => $phone,
        'amount' => $amount,
    ]);


    }

    public function handle_result(Request $request)
    {
        $data = $request->all();
        $data = $data['Body']['stkCallback'];
        $result = Payment::where('checkoutRequestID', $data['CheckoutRequestID'])->where('active', true)->first();
        $result->active = false;
        $result->result = json_encode($data);
        $result->save();

        if($result == null || $result->merchantRequestID != $data['MerchantRequestID'])
            return null;
        $result->resultCode = $data['ResultCode'];
        $result->resultDesc = $data['ResultDesc'];
        $result->save();
        if($result->resultCode == 0){
            $items = $data['CallbackMetadata']['Item'];
            foreach($items as $item){
                if($item['Name'] == 'Amount' && array_key_exists('Value', $item))
                    $result->amount = $item['Value'];
                elseif($item['Name'] == 'MpesaReceiptNumber' && array_key_exists('Value', $item))
                    $result->mpesaReceiptNumber = $item['Value'];
                elseif($item['Name'] == 'Balance' && array_key_exists('Value', $item))
                    $result->balance = $item['Value'];
                elseif($item['Name'] == 'TransactionDate' && array_key_exists('Value', $item))
                    $result->transactionDate = date('Y-m-d H:i:s', strtotime($item['Value']));
            }
            if($result->save()){
                $user = User::find($result->user_id);

                $deposited_at = now()->format('Y-m-d H:i:s');

                $wallet = Wallet::where('user_id',$user->id);
                if ( $wallet->count() > 0 ) {
                    # code...
                    $wallet->amount  += $result->amount ;
                $wallet->deposite_at = $deposited_at ;
                $wallet->save();
                } else {
                    # code...
                    $user->wallet()->create([
                        'amount' => $result->amount ,
                       'deposite_at' => $deposited_at
                    ]);
                }


            }
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
