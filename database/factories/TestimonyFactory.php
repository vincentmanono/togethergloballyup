<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Testimony;
use Faker\Generator as Faker;

$factory->define(Testimony::class, function (Faker $faker) {
    return [
        'user_id'=>function(){ return User::all()->random() ;},

        'body'=>$faker->realText(100,4)
    ];
});
