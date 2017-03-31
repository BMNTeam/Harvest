<?php

namespace App\Http\Controllers;

use App\Culture;
use App\Customer;
use App\Order;
use App\Reproduction;
use App\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
   public function getStocks()
   {
        $stocks = Stock::all();
        $customers = Customer::all();
        $orders = Order::all();

        //Count number of orders for current sort
        //Enable or disable remove ability
        foreach ($stocks as $stock)
        {
            $all_orders_with_this_stock_element = $orders->where(  'stock_id', $stock->id )->all();

            //If it has orders then calculate number of each element in orders
            if ($all_orders_with_this_stock_element != NULL ){
                foreach ($all_orders_with_this_stock_element as $order_in_stock){
                    $stock -> orders_number += 1;
                    $stock -> deletable = false;
                }
            }else{
                $stock->orders_number = 0;
                $stock->deletable = true;
            }

        }

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
