<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Withdraw extends Model
{
    use softDeletes ;
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
