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
            'firstName'=>'John',
            'lastName' =>'Doe',
            'email' =>'info@togethergloballyup.com',
            'role'=>'super',
            'phone'=>'0707585566',
            'email_verified_at' => now(),
        'password' => Hash::make("password") ,
        'remember_token' => Str::random(10),
        ] );
    User::create(  [
            'firstName'=>'test',
            'lastName' =>'Yahoo',
            'email' =>'test@togethergloballyup.com',
            'role'=>'super',
            'phone'=>1234567890,
            'email_verified_at' => now(),
        'password' => Hash::make("password") ,
        'remember_token' => Str::random(10),
        ]
    );

    User::create(  [
        'firstName'=>'user',
        'lastName' =>'Normal',
        'email' =>'user@togethergloballyup.com',
        'role'=>'user',
        'phone'=>1234567899,
        'email_verified_at' => now(),
    'password' => Hash::make("password") ,
    'remember_token' => Str::random(10),
    ]
);



// factory(App\User::class,3)->create()->each( function ($user){
//     $user->wallet()->save(factory(App\Wallet::class)->make());
// } ) ;

    }
}
