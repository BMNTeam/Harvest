<?php

namespace App\Http\Controllers;

use App\Culture;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
   public function getOrders(){
       $cultures = Culture::all();

       return view('applications',[
            'cultures' => $cultures
       ]);
   }
}
