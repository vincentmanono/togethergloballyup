<?php

namespace App\Jobs;

use App\Wallet;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class WalletQuery implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $user , $result ;
    public function __construct($user , $result)
    {
        $this->user = $user;
        $this->result = $result;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = $this->user ;
        $result = $this->result ;
        $wallet = Wallet::where('id',$result->paymentable->id)->first();
        $wallet->amount += $result->amount ;
        $wallet->save();

    }
}
