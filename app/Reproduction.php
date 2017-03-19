<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reproduction extends Model
{
    public function sort()
    {
        return $this->belongsTo('App\Stock', 'id');
    }
}
