<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Chama;
use App\Wallet;
use Faker\Generator as Faker;

$factory->define(Wallet::class, function (Faker $faker) {
    return [
        'user_id'=>function(){ return User::all()->random() ;},
        'amount' => $faker->numberBetween(100,1000),
        'deposite_at' => $faker->dateTimeBetween('-30 days', '0 days'),
        'withdraw_at' => $faker->dateTimeBetween('-30 days', '0 days'),
    ];
});
