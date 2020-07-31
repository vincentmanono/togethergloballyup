<?php

namespace App\Http\Controllers;

use App\User;
use App\Payment;
use App\Subscription;
use Illuminate\Http\Request;
use App\payment\MpesaGateway;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{

    public function index()
    {
        if ( auth()->user()->role == 'super' ) {
            $subscriptions = Subscription::orderBy('created_at', 'DESC')->paginate(100);
            return view('admin.subscriptions.allSubscriptions',compact('subscriptions')) ->with('param', 'all');
        } else {
           $subscriptions = Subscription::where('user_id',auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(100);
           return view('admin.subscriptions.mySubscription',compact('subscriptions'))->with('param', 'all');
        }


    }


    public function active_subscriptions()
    {
        $subscriptions = Subscription::where('expiry_date', '>=', now()->format('Y-m-d H:i:s'))->orderBy('created_at', 'DESC')->paginate(100);
        return view('admin.subscriptions.allSubscriptions',compact('subscriptions'))->with('param', 'Active');
    }


    public function renew(Request $request, MpesaGateway $mpesaGateway){
        request()->validate(array( //|regex:/(^(\d+){1,10})/u
            'phone' => 'required|numeric',
        ));
        $amount = 1;
        $phone = $request->phone;

      $response =   $mpesaGateway->pay_subcription($phone,$amount) ;

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
    return back()->with('success', $result->customerMessage);

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
                $days = 10;
                $now = now()->format('Y-m-d H:i:s');
                if($user->subscription_expiry != null && $user->subscription_expiry > $now){
                    $start_date = $user->subscription_expiry;
                    $user->subscription_expiry = date('Y-m-d H:i:s', strtotime('+' . $days . ' day', strtotime($user->subscription_expiry)));
                }
                else{
                    $start_date = $now;
                    $user->subscription_expiry = date('Y-m-d H:i:s', strtotime('+' . $days . ' day', strtotime($now)));
                }
                $user->save();
                Subscription::create([
                    'user_id' => $result->user_id,
                    'amount' => $result->amount,
                    'payment_id' => $result->id,
                    'expiry_date' => $user->subscription_expiry,
                    'start_date' => $start_date,
                ]);
            }
        }

    }


    public function time_out_url(Request $request)
    {
        $result = Payment::create([
           'result' =>$request

        ]);

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
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        //
    }
}
