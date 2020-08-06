<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(User::class,1)->create();

        User::create(
            [
            'name' =>'togethergloballyup',
            'email' =>'info@togethergloballyup.com',
            'slug'=> Str::slug( 'togethergloballyup' ) ,
            'role'=>'super',
            'phone'=>'1234567890',
            'email_verified_at' => now(),
        'password' => Hash::make("password") ,
        'remember_token' => Str::random(10),
        ] );
    User::create(  [
            'name'=>'Abraham Kivondo',
            'slug'=> Str::slug( 'Abraham Kivondo' ) ,
            'email' =>'abrahamkivosh@gmail.com',
            'role'=>'super',
            'phone'=>'0707585566',
            'email_verified_at' => now(),
        'password' => Hash::make("password") ,
        'remember_token' => Str::random(10),
        ]
    );

    }
}
