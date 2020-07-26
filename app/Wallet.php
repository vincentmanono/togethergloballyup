<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

     /**
     * Get all of the wallets's payments.
     */


    public function  payments()
    {
        return $this->morphMany(Payment::class, 'paymentable');
    }





}
