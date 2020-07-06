<?php


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ChamaSeeder::class);
        $this->call(PaymentSeeder::class);
        $this->call(ChamaUserSeeder::class);
        $this->call(TestimonySeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(SubscribeSeeder::class);
        $this->call(SubscriptionSeeder::class);

    }
}
