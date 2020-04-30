<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
    protected $guarded = [];

    public function path()
    {
        return '/units/' . $this->id;
    }

    public function charges() : HasMany
    {
        return $this->hasMany('App\Charge');
    }
}
