<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Chama;
use App\User;
use App\Ticket;
use Faker\Generator as Faker;

$factory->define(Ticket::class, function (Faker $faker) {
    return [
        'user_id'=>function(){ return User::all()->random() ;},
        'chama_id'=>function(){ return Chama::all()->random() ;},
        // 'user_id'=>
        'pay'=>$faker->boolean(20),
        'given'=>$faker->boolean()
    ];
});
