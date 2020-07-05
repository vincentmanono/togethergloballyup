<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Chama;
use App\ChamaUser;
use Faker\Generator as Faker;

$factory->define(ChamaUser::class, function (Faker $faker) {
    return [
        'user_id'=>function(){ return User::all()->random() ;},
        'chama_id'=>function(){ return Chama::all()->random() ;},
    ];
});
