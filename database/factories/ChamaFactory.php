<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Chama;
use App\User;
use Faker\Generator as Faker;

$factory->define(Chama::class, function (Faker $faker) {
    return [
        'user_id'=>function(){ return User::all()->random() ;},
        'name' =>$faker->word,
        'description'=>$faker->realText(100,4)
    ];
});
