<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{ protected $fillable = [
    'body','user_id'
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
