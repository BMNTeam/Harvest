<?php

namespace App\Http\Controllers;

use App\Culture;
use App\Customer;
use App\Reproduction;
use App\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
   public function getStocks()
   {
        $stocks = Stock::all();
        $customers = Customer::all();

       return view('applications',[
           'stocks' => $stocks,
           'customers' => $customers
       ]);

   }


   public function removeStockElement( $stock_id )
   {
       if( ! empty($stock_id)) {
           $stock_element_to_remove = Stock::where('id', $stock_id);
           $stock_element_to_remove->delete();

           return redirect()->back();
       }else{
           return redirect()->back();
       }
   }

   public function editStockElement (Request $request)
   {

        $id   = $request['stock_id'];
        $vall = $request['change_vall'];
        $corn = $request['change_corns'];

        $stock = Stock::find($id);
        $stock->vall = $vall;
        $stock->corns = $corn;

        $stock->save();

        return redirect()->back();
   }



}
