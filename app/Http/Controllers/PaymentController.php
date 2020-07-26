<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use App\Wallet;
use App\Payment;
use App\Subscription;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\payment\MpesaGateway;

class PaymentController extends Controller
{
    public function transactions()
    {
        $transactions = Payment::orderBy('transactionDate', 'DESC')->where('responseCode',  0)->get();
        // $transactions = Payment::all();
        return view('admin.mpesa.alltransactions')->with('transactions', $transactions)->with('param', 'All');
    }

    public function completed()
    {
        $transactions = Payment::orderBy('transactionDate', 'DESC')->where('resultCode', 0)->paginate(200);
        return view('admin.mpesa.alltransactions')->with('transactions', $transactions)->with('param', 'Completed');
    }
    public function cancelled()
    {
        $transactions = Payment::orderBy('transactionDate', 'DESC')->where('resultCode', '!=', 0)->paginate(200);
        return view('admin.mpesa.alltransactions')->with('transactions', $transactions)->with('param', 'Cancelled');
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
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Payment::find($id) ;

        return view('admin.mpesa.show')->with('transaction', $transaction)->with('param', 'All');
    }

    // /admin/mpesa/query-request?checkoutRequestID=' . $transaction->checkoutRequestID . '

    public function query_request(Request $request , MpesaGateway $mpesaGateway){
        $access_token = $mpesaGateway->get_access_token() ;
        $client = new Client();
        $time = date('YmdHis');
        // $shortcode = \Config::get('mpesa.shortcode');
        $shortcode = "174379";
        $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        $password = base64_encode($shortcode . $passkey . $time);
        $checkoutRequestID = $request->checkoutRequestID;
        // $query_url = \Config::get('mpesa.stkpushquery_url');

        $query_url = "";






        $headers = [
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ];
        $data = [
            "BusinessShortCode" => $shortcode,
            "Password" => $password,
            "Timestamp" => $time,
            "CheckoutRequestID" => $checkoutRequestID,
        ];
        try {
            $request = $client->request('POST', $query_url, [
                'headers' => $headers,
                'json' => $data,
            ]);
            $response = $request->getBody()->getContents();
            $data = json_decode($response, true);
            if($data['ResponseCode'] === '0'){
                $result = Payment::where('checkoutRequestID', $data['CheckoutRequestID'])->first();
                if($result == null)
                    // dd('No existing record for this transaction.');
                    return redirect()->back()->with('error', 'No existing record for this transaction.');
                if($result->active == true){
                    $result->active = false;
                    $result->resultCode = $data['ResultCode'];
                    $result->resultDesc = $data['ResultDesc'];
                    if($result->resultCode == 0){
                        if($result->save()){
                            $user = User::find($result->user_id);

                            $subscription = Subscription::where('payment_id',$result->id)->first();
                            // $wallet = Wallet::where('pay')
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
                            if ($subscription != null ) {
                                $subscription->amount = $result->amount;
                                $subscription->expiry_date =  $user->subscription_expiry;
                                $subscription->start_date = $start_date;
                                $subscription->save();

                            } else {
                                # code...
                                Subscription::create([
                                    'user_id' => $result->user_id,
                                    'amount' => $result->amount,
                                    'payment_id' => $result->id,
                                    'expiry_date' => $user->subscription_expiry,
                                    'start_date' => $start_date,
                                ]);
                            }





                            // dd('Database Updated Successfully');
                            return redirect()->back()->with('success', "Transaction was successful. Subscription activated.");
                        }
                        // dd('failed to save');
                        return redirect()->back()->with('error', "An arror occured. " . $data['ResultDesc']);
                    }
                    // dd($data['ResultDesc']);
                    return redirect()->back()->with('error', "The transaction had failed due to: " . $data['ResultDesc']);
                }
                else{
                    // dd('Transaction had been successfully recorded recorded earlier.');
                    return redirect()->back()->with('data', $data)->with('info', 'Transaction had been successfully recorded earlier.');
                }

            }
            return redirect()->back()->with('error', "The transaction had failed due to: " . $data['responseDescription']);
            // dd($data['responseDescription']);
        }
        catch (Exception $e) {
            return redirect()->back()->with('error', 'Transaction failed, please try again.');
            // dd('Request failed, please try again.');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
