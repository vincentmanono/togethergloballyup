<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chama extends Model
{
    protected $guarded = [];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }


    public function users()
    {
        return $this->belongsToMany('App\User')->using('App\ChamaUser');
    }

    public function admin()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }



    public function wallets()
    {
        return $this->hasManyThrough(Wallet::class, User::class);
    }


}
