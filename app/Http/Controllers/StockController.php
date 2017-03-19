<?php

namespace App\Http\Controllers;

use App\Culture;
use App\Reproduction;
use App\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
   public function getStocks(){

        $stock = Stock::find(1)->sorts->sort_name;
        $stock = $stock;


        var_dump($stock);




      /* return view('applications',[
           'stocks' => $stocks
       ]);*/

   }
}
