<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded = [];

    public function chama()
    {
        return $this->belongsTo(Chama::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
