<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function culture() {

        $this->hasOne('App\Culture');
    }
}
