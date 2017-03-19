<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Culture extends Model
{
   public function orders(){

       return $this->belongsTo('App\Stock', 'id');
   }

   public function sorts()
   {
        $this->hasMany('App\Sort');

   }
}
