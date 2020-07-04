<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Chama;
use App\Group;
use Faker\Generator as Faker;

$factory->define(Group::class, function (Faker $faker) {
    return [
        'user_id'=>function(){ return User::all()->random() ;},
        'chama_id'=>function(){ return Chama::all()->random() ;},
    ];
});
