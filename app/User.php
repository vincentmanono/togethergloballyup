<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable , SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName','role','phone','email', 'password','image','subscription_expiry'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
   public function allMyChama() //for admins only
   {
       return $this->hasMany(Chama::class) ;
   }

   public function chamaSubscribed() //for users to subscribe to chamas
    {
        return $this->belongsToMany('App\Chama')->using('App\ChamaUser');
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function withdraws()
    {
        return $this->hasMany(Withdraw::class);
    }





   public function payments() //payment to chama monthly payment
   {
       return $this->hasMany(Payment::class);
   }

//    public function payments()
//    {
//        return $this->hasManyThrough('App\Payment', App\Post);
//    }

   public function testimonies()
   {
       return $this->hasMany(Testimony::class);
   }
   public function messages()
   {
       return $this->hasMany(Message::class);
   }

   public function wallet()
   {
       return $this->hasOne(Wallet::class);
   }

}
