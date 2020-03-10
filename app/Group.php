<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $fillable = ['name', 'description', 'types'];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
