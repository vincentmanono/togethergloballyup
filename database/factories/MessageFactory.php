<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'to' =>function(){ return User::all()->random() ;},
        'from' =>function(){ return User::all()->random() ;},
        'body'=>$faker->realText(100,4)
    ];
});
