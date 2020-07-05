<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Chama;
use App\User;
use App\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        'user_id'=>function(){ return User::all()->random() ;},
        'chama_id'=>function(){ return Chama::all()->random() ;},
        'phone'=>$faker->phoneNumber,
        'MerchantRequestID'=>$faker-> randomDigit(2,100) ,
        'CheckoutRequestID'=>$faker-> randomDigit(2,100) ,
        'ResponseCode'=>$faker-> randomDigit(1,5) ,
        'ResultDesc'=>$faker-> realText(20,4) ,
        'ResponseDescription'=>$faker->realText(20,4),
        'ResultCode'=>$faker-> randomDigit(1,5)
    ];
});
