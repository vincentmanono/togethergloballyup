<?php

namespace App\payment;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class MpesaGateway // extends AnotherClass implements Interface
{
    public function __construct()
    {
        $this->shortcode1 = "600231";
        $this->InitiatorName = "testapi0231" ;
        $this->SecurityCredential  = "Safcom231!"; //shortcode1
        $this->TestMSISDN = "254708374149";
        $this->shortcode = "174379"; //Lipa Na Mpesa Online Shortcode:
        $this->LipaNaMpesaOnlinePassKey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";

    }

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
    public function pay_subcription($phoneNumber, $amount )
    {
        $phoneNumber = intval($phoneNumber);
        $phoneNumber = '254' . $phoneNumber;
        $phoneNumber = $phoneNumber;

        // $api_url = "https://sandbox.safaricom.co.ke/mpesa/b2c/v1/paymentrequest";
        $api_url = "https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";
        $access_token = $this->get_access_token();
        // $Shortcode = "600620";
        $time = date('YmdHis');
        $shortcode = $this->shortcode ;
        $LipaNaMpesaOnlinePassKey =   $this->LipaNaMpesaOnlinePassKey ;
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
            "CallBackURL" =>  "https://togethergloballyup.com/api/handle-result",
            "QueueTimeOutURL" => "https://togethergloballyup.com/api/handle-timeout",
            "AccountReference" => "Subscription Payment",
            "TransactionDesc" => "Subscription Payment"
        ];

       $response =  Http::withHeaders($headers)->post($api_url,$data )->json() ;
        return $response ;


    }

    public function wallet($phoneNumber, $amount )
    {
        $phoneNumber = intval($phoneNumber);
        $phoneNumber = '254' . $phoneNumber;
        $phoneNumber = $phoneNumber;

        // $api_url = "https://sandbox.safaricom.co.ke/mpesa/b2c/v1/paymentrequest";
        $api_url = "https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";
        $access_token = $this->get_access_token();
        // $Shortcode = "600620";
        $time = date('YmdHis');
        $shortcode = $this->shortcode;
        $LipaNaMpesaOnlinePassKey =   $this->LipaNaMpesaOnlinePassKey ;
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

            "CallBackURL" =>  "https://togethergloballyup.com/api/handle-deposite-result",
            "QueueTimeOutURL" => "https://togethergloballyup.com/api/handle-timeout",


            "AccountReference" => "Deposite to my wallet",
            "TransactionDesc" => "Deposite to my wallet"
        ];

        $response =  Http::withHeaders($headers)->post($api_url,$data )->json() ;
        return $response ;
    }
    public function activate_chama($phoneNumber, $amount )
    {
        $phoneNumber = intval($phoneNumber);
        $phoneNumber = '254' . $phoneNumber;
        $phoneNumber = $phoneNumber;

        // $api_url = "https://sandbox.safaricom.co.ke/mpesa/b2c/v1/paymentrequest";
        $api_url = "https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";
        $access_token = $this->get_access_token();
        // $Shortcode = "600620";
        $time = date('YmdHis');
        $shortcode =$this->shortcode;
        $LipaNaMpesaOnlinePassKey =  $this->LipaNaMpesaOnlinePassKey ;
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

            "CallBackURL" =>  "https://togethergloballyup.com/api/handle-chama-activate-result",
            "QueueTimeOutURL" => "https://togethergloballyup.com/api/handle-timeout",


            "AccountReference" => "Chama Activation Payment",
            "TransactionDesc" => "Chama Activation Payment"
        ];

        try {
            $request = $client->request('POST', $api_url, [
                'headers' => $headers,
                'json' => $data,
            ]);
            $response = $request->getBody()->getContents();
            $response = json_decode($response, true);
            return  $response;
        } catch (\Throwable $th) {

            return back()->with('error', "error occurred");
        }
    }

    public function withdraw($phoneNumber ,$amount)
    {
        $phoneNumber = intval($phoneNumber);
        $phoneNumber = '254' . $phoneNumber;
        // $phoneNumber = $phoneNumber;
        $phoneNumber =  $this->TestMSISDN;
        $api_url = "https://sandbox.safaricom.co.ke/mpesa/b2c/v1/paymentrequest";
        $access_token = $this->get_access_token();
        $InitiatorName =  $this->InitiatorName ;
        $time = date('YmdHis');
        $shortcode = $this->shortcode1 ;
        $LipaNaMpesaOnlinePassKey =  $this->LipaNaMpesaOnlinePassKey  ;
        $SecurityCredential  = base64_encode($shortcode . $LipaNaMpesaOnlinePassKey . $time);

        $client = new Client();
        $headers = [
            'Host'=> 'sandbox.safaricom.co.ke',
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ];


        $data = [
            "InitiatorName"=> $InitiatorName,
            "SecurityCredential"=>$SecurityCredential,
            "CommandID"=> "BusinessPayment",
            "Amount"=> $amount,
            "PartyA"=> $shortcode,
            "PartyB"=> $phoneNumber,
            "Remarks"=> "Withdraw from wallet",
            "QueueTimeOutURL" => "https://togethergloballyup.com/api/handle-timeout",
            "ResultURL"=> "https://togethergloballyup.com/api/handle-withdraw-result",
            "Occasion"=> " "

        ];


            $response = Http::withHeaders( $headers)->post($api_url,$data);
            $response = $response->json();
            // $response = json_decode($response, true);

            return $response ;


    }



}
