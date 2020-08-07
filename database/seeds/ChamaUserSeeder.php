<?php

use App\ChamaUser;
use Illuminate\Database\Seeder;

class ChamaUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ChamaUser::class,5)->create();
    }
}
