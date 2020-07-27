<?php

namespace App\Http\Controllers;

use App\Jobs\SubscriptionQuery;
use App\Jobs\WalletQuery;
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
