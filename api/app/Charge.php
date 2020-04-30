<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; 

class Charge extends Model
{
    protected $guarded = [];
    
    public function path()
    {
        return '/charges/' . $this->id;
    }

    public function unit() : BelongsTo 
    {
        return $this->belongsTo('App\Unit');
    }
}
