<?php

namespace App\payment;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class MpesaGateway // extends AnotherClass implements Interface
{
    public function __construct()
    {
        $this->shortcode1 = "600231";
        $this->InitiatorName = "testapi0231"; //shortcode 1
        $this->SecurityCredential  = "Safcom231!"; //shortcode1
        $this->shortcode2 = "600231"; //shortcode 2
        $this->TestMSISDN = "254708374149";
        $this->shortcode = "4037673"; //Lipa Na Mpesa Online Shortcode://4037673
        $this->LipaNaMpesaOnlinePassKey = "5067f3505559cdfa4a7c8f9336a3297557401ac7fc3e7ce27919022d65b3c2c8";
    }

    public function get_access_token()
    {
        $Consumer_Key = "jE5CuyVAaWzikAUMHiNqCfI2Teeuo9vB";
        $Consumer_Secret = "qoADqhpn9iQPGoeD";
        $key_sec = $Consumer_Key . ":" . $Consumer_Secret;
        $url = 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $headers = ['Content-Type: application/json;charset=UTF-8'];

        $base64 = base64_encode($key_sec);

        $headers =  [
            'Host' => 'api.safaricom.co.ke',
            'Authorization' => 'Basic ' . $base64,
            'Content-Type' => 'application/json'
        ];


        $response = Http::withHeaders($headers)->get($url);
        $access_token = $response->json()['access_token'];
        return $access_token;
    }










    public function wallet($phoneNumber, $amount,$reference = "subscription",$callback)
    {
        $phoneNumber = intval($phoneNumber);
        $phoneNumber = '254' . $phoneNumber;
        $phoneNumber = $phoneNumber;

        $api_url = 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $access_token = $this->get_access_token();
        $time = date('YmdHis');
        $shortcode = $this->shortcode;
        $LipaNaMpesaOnlinePassKey =   $this->LipaNaMpesaOnlinePassKey;
        $SecurityCredential  = base64_encode($shortcode . $LipaNaMpesaOnlinePassKey . $time);
        $callback = $callback ;



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
            "CallBackURL" =>  $callback ,
            "QueueTimeOutURL" => "https://togethergloballyup.com/api/handle-timeout",

            "AccountReference" => $reference,
            "TransactionDesc" => $reference
        ];

        $response =  Http::withHeaders($headers)->post($api_url, $data)->json();
        return $response;
    }


    public function withdraw($phoneNumber, $amount)
    {
        $shortcode = $this->shortcode;
        $phoneNumber = intval($phoneNumber);
        $phoneNumber = '254' . $phoneNumber;
        $phoneNumber =  $this->TestMSISDN;
        $api_url =  'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $access_token = $this->get_access_token();
        $InitiatorName =  $this->InitiatorName;
        $time = date('YmdHis');

        $LipaNaMpesaOnlinePassKey =   $this->LipaNaMpesaOnlinePassKey;
        $SecurityCredential  = base64_encode($shortcode . $LipaNaMpesaOnlinePassKey . $time);

        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ];


        $data = [
            "InitiatorName" => $InitiatorName,
            "SecurityCredential" => $SecurityCredential,
            "CommandID" => "BusinessPayment",
            "Amount" => $amount,
            "PartyA" => $shortcode,
            "PartyB" => $phoneNumber,
            "Remarks" => "Withdraw from wallet",
            "QueueTimeOutURL" => "https://togethergloballyup.com/api/handle-timeout",
            "ResultURL" => "https://togethergloballyup.com/api/handle-withdraw-result",
            "Occasion" => " "

        ];


        $response = Http::withHeaders($headers)->post($api_url, $data);
        $response = $response->json();
        // $response = json_decode($response, true);

        return $response;
    }
}
