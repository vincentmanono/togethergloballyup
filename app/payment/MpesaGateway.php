<?php

namespace App\payment;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class MpesaGateway // extends AnotherClass implements Interface
{

    public function get_access_token()
    {
        $Consumer_Key = "NFvAmAESuF667Bvleo2o71wbKluPnkfX";
        $Consumer_Secret = "gY4Lg6osipYRIgwA";
        $key_sec = $Consumer_Key . ":" . $Consumer_Secret;
        $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $headers = ['Content-Type: application/json;charset=UTF-8'];

        $base64 = base64_encode($key_sec) ;

        $headers =  [
            'Host'=> 'sandbox.safaricom.co.ke',
            'Authorization'=> 'Basic '.$base64,
            'Content-Type'=> 'application/json'
        ];


        $response = Http::withHeaders($headers)->get($url) ;
        $access_token = $response->json()['access_token'] ;
        return $access_token;
    }
    public function make_payment($phoneNumber, $amount, $reference = "Subscription Payment", $CallBackURL = "http://togethergloballyup.com")
    {
        $phoneNumber = intval($phoneNumber);
        $phoneNumber = '254' . $phoneNumber;
        $phoneNumber = $phoneNumber;

        // $api_url = "https://sandbox.safaricom.co.ke/mpesa/b2c/v1/paymentrequest";
        $api_url = "https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";
        $access_token = $this->get_access_token();
        // $Shortcode = "600620";
        $time = date('YmdHis');
        $shortcode = "174379";
        $LipaNaMpesaOnlinePassKey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        $SecurityCredential  = base64_encode($shortcode . $LipaNaMpesaOnlinePassKey . $time);



        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ];


        $data = [
            "BusinessShortCode" => $shortcode,
            "Password" => $SecurityCredential,
            "Timestamp" => $time,
            "TransactionType" => "CustomerPayBillOnline",
            "Amount" => $amount,
            "PartyA" => $phoneNumber,
            "PartyB" => $shortcode,
            "PhoneNumber" => $phoneNumber,
            "CallBackURL" =>  route('handle_subscription_result_api'),
            "QueueTimeOutURL" => route('handle_QueueTimeOutURL'),
            "AccountReference" => "Subscription Payment",
            "TransactionDesc" => "Subscription Payment"
        ];

        $value = [
            "BusinessShortCode" => "174379",
            "Password" => $SecurityCredential,
            "Timestamp" => $time,
            "TransactionType" => "CustomerPayBillOnline",
            "Amount" => "1",
            "PartyA" => $phoneNumber,
            "PartyB" => "174379",
            "PhoneNumber" => $phoneNumber,
            "CallBackURL" => $CallBackURL,
            "AccountReference" => $reference,
            "QueueTimeOutURL" => "https://www.togethergloballyup.com",
            "TransactionDesc" => $reference,
        ];

        try {
            $request = $client->request('POST', $api_url, [
                'headers' => $headers,
                'json' => $value,
            ]);
            $response = $request->getBody()->getContents();
            $response = json_decode($response, true);
            return  $response;
        } catch (\Throwable $th) {

            return back()->with('error', "error occurred");
        }
    }
}