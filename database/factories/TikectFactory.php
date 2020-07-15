<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Chama;
use App\Tikect;
use Faker\Generator as Faker;

$factory->define(Tikect::class, function (Faker $faker) {
    return [
        'user_id'=>function(){ return User::all()->random() ;},
        'chama_id'=>function(){ return Chama::all()->random() ;},
        'pay'=>$faker->boolean(10)
    ];
});
