<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Payment;
use App\User;
use App\Subscription;
use Faker\Generator as Faker;

$factory->define(Subscription::class, function (Faker $faker) {
    return [
        'start_date' => $faker->dateTimeBetween('-30 days', '0 days'),
        'expiry_date' => $faker->dateTimeBetween('-30 days', '+30 days'),
        'amount' => $faker->numberBetween(100,1000) ,
        'user_id'=>function(){ return User::all()->random() ;},
    ];
});
