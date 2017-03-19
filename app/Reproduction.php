<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reproduction extends Model
{
    public function sort()
    {
        $this->belongsTo('App\Stock');
    }
}
