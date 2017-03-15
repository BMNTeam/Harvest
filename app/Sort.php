<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sort extends Model
{
    public function culture()
    {
        $this->belongsTo('App\Culture');
    }
}
