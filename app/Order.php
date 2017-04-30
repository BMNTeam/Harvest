<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $table = 'order';

    public function stock()
    {
        return $this->hasOne('App\Stock', 'id', 'stock_id');
    }

    public function customer()
    {
        return $this->hasOne('App\Customer', 'id', 'customer_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'id');
    }



}
