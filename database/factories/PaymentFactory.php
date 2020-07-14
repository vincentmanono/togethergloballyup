<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Chama;
use App\User;
use App\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        'user_id'=>function(){ return User::all()->random() ;},

        'merchantRequestID'=>$faker-> randomDigit(2,100) ,
        'checkoutRequestID'=>$faker-> randomDigit(2,100) ,
        'responseCode'=>$faker-> randomDigit(1,5) ,
        'resultDesc'=>$faker-> realText(20,4) ,
        'responseDescription'=>$faker->realText(20,4),
        'resultCode'=>$faker-> randomDigit(1,5),
        'phoneNumber'=>$faker->phoneNumber,
    ];
});
