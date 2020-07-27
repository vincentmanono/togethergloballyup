<?php

namespace App\Jobs;

use App\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SubscriptionQuery implements ShouldQueue
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
        $subscription = Subscription::where('id',$result->paymentable->id)->first();
                            // $wallet = Wallet::where('pay')
                            $days = 10;
                            $now = now()->format('Y-m-d H:i:s');
                            if($user->subscription_expiry != null && $user->subscription_expiry > $now){
                                $start_date = $user->subscription_expiry;
                                $user->subscription_expiry = date('Y-m-d H:i:s', strtotime('+' . $days . ' day', strtotime($user->subscription_expiry)));
                            }
                            else{
                                $start_date = $now;
                                $user->subscription_expiry = date('Y-m-d H:i:s', strtotime('+' . $days . ' day', strtotime($now)));
                            }
                            $user->save();
                            if ($subscription != null ) {
                                $subscription->amount = $result->amount;
                                $subscription->expiry_date =  $user->subscription_expiry;
                                $subscription->start_date = $start_date;
                                $subscription->save();

                            } else {
                                # code...
                                Subscription::create([
                                    'user_id' => $result->user_id,
                                    'amount' => $result->amount,
                                    'payment_id' => $result->id,
                                    'expiry_date' => $user->subscription_expiry,
                                    'start_date' => $start_date,
                                ]);
                            }

                            // dd('Database Updated Successfully');
                            return redirect()->back()->with('success', "Transaction was successful. Subscription activated.");
                        }

}
