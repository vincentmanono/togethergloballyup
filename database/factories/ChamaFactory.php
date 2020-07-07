<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Chama;
use App\User;
use Faker\Generator as Faker;

$factory->define(Chama::class, function (Faker $faker) {
    return [
        'user_id'=>function(){ return User::all()->random() ;},
        'name' =>$faker->word,
        'amount' =>$faker->numberBetween(10,2000),
        'duration'=> $faker->dateTimeBetween('-30 days', '+30 days'),
        'description'=>$faker->realText(100,4),
        'activate'=>$faker->boolean()
    ];
});
