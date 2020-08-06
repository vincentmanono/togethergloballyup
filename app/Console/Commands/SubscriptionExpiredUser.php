<?php

namespace App\Console\Commands;

use App\Notifications\notifySubscriptionExpiredUser;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class SubscriptionExpiredUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:expiry';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checking Users who subscription expired';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $now = now()->format('Y-m-d H:i:s');
        $inactiveUsers = User::where('subscription_expiry','<=', $now )->get();

        foreach ($inactiveUsers as  $user) {
            Notification::send($user,new notifySubscriptionExpiredUser($user)) ;
        }

    }
}
