<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sort extends Model
{
    public function sorts ()
    {
        return $this->belongsTo('App\Stock', 'id');
    }
}
