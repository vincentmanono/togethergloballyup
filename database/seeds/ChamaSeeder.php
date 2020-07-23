<?php

use App\Chama;
use App\Ticket;
use Illuminate\Database\Seeder;

class ChamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Chama::class,10)->create();
        // factory(Ticket::class,5)->create();
    }
}
