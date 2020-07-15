<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tikect extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chama()
    {
        return $this->belongsTo(Chama::class);
    }


}
