<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public $table = "stock";

    public function sorts(){
        return $this->hasOne('App\Sort', 'id');
    }

    public function reproduction() {
        $this->hasOne('App\Reproduction');
    }

    public function culture() {
        $this->hasOne('App\Culture');
    }
}
