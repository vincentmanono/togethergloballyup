<?php

use Illuminate\Database\Seeder;

class TikectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Tikect::class,5)->create();
    }
}
