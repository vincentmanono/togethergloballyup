<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Chama;
use App\User;
use App\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        'user_id'=>function(){ return User::all()->random() ;},
        'paymentable_id'=>function(){ return User::all()->random() ;},
        'paymentable_type' => function(){
            $results = [
                'App\Chama', 'App\Wallet','App\Subscription',
            ];
            return $results[array_rand($results)];
        },
        'merchantRequestID'=>$faker-> randomDigit(2,100) ,
        'checkoutRequestID'=>$faker-> randomDigit(2,100) ,
        'amount' => $faker-> randomDigit(1500,20000) ,
        'responseCode' => function(){
            $results = [
                0, 1032, '',
            ];
            return $results[array_rand($results)];
        },
        'resultCode' => function(){
            $results = [
                0, 1032, '',
            ];
            return $results[array_rand($results)];
        },
        'resultDesc'=>$faker-> realText(20,4) ,
        'responseDescription'=>$faker->realText(20,4),
        'resultCode'=>$faker-> randomDigit(1,5),
        'phoneNumber'=>$faker->phoneNumber,
        'mpesaReceiptNumber' => $faker->phoneNumber,
        'balance' => $faker->randomFloat(),
        'active' => $faker->boolean,
        'transactionDate' => $faker->dateTimeBetween('-30 days', '+0 days'),
    ];
});
