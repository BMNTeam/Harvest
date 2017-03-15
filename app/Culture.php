<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Culture extends Model
{
   public function orders(){

       $this->belongsTo('App\Order');
   }

   public function sorts()
   {
       $this->hasMany('App\Sort');

   }
}
