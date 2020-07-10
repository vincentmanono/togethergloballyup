<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName','role','phone',  'email', 'password',
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
   public function chama() //for admins only
   {
       return $this->hasOne(Chama::class);
   }

   public function chamaSubscribed() //for users to subscribe to chamas
    {
        return $this->belongsToMany('App\Chama')->using('App\ChamaUser');
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }





   public function payments() //payment to chama monthly payment
   {
       return $this->hasMany(Payment::class);
   }
   public function testimonies()
   {
       return $this->hasMany(Testimony::class);
   }
   public function messages()
   {
       return $this->hasMany(Message::class);
   }
}
