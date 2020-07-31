<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Message;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'user_id' =>function(){ return User::all()->random() ;},
        'to' =>$faker->email,
        'from' =>$faker->email,
        'subject'=>$faker->realText(100,4),
        'slug' =>Str::slug( $faker->realText(50,4), ),
        'body'=>$faker->realText(150,4)
    ];
});
