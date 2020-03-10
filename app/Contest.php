<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    public $fillable = ['name', 'description', 'age_limit', 'types'];

    public function group()
    {
        return $this->hasMany(Group::class);
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
