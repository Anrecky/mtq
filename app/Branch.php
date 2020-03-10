<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public $fillable = ['name', 'description'];

    public function contest()
    {
        return $this->hasMany(Contest::class);
    }
}
