<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public $table = "stock";

    public function sorts(){
        return $this->hasOne('App\Sort', 'id', 'sort_id');
    }

    public function reproductions() {
       return $this->hasOne('App\Reproduction', 'id', 'reproduction_id');
    }

    public function cultures() {
        return $this->hasOne('App\Culture', 'id', 'culture_id');
    }
}
