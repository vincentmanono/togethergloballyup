<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chama extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
