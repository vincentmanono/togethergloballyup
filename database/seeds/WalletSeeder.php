<?php

use App\User;
use App\Wallet;
use Illuminate\Database\Seeder;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(User::class,3)->create()->each( function ($user){
        //     $user->wallet()->save(factory(Wallet::class)->make());
        // } ) ;

    }
}
