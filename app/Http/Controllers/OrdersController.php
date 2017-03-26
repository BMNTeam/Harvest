<?php

namespace App\Http\Controllers;

use App\Order;
use App\Stock;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function getAllElementsInOrders ()
    {
        $orders = Order::all();

        return view('orders',[
            'orders' => $orders
        ]);
    }

    public function createElementInOrder(Request $request)
    {
        $this -> validate( $request, [
            'stock_id'              => 'required',
            'select-customer-name'  => 'required',
            'amount_of_corns'       => 'required'
        ]);

        $stock_id = $request['stock_id'];
        $customer = $request['select-customer-name'];
        $amount   = $request['amount_of_corns'];

        $order = new Order();

        $order -> stock_id       = $stock_id;
        $order -> customer_id    = $customer;
        $order -> amount_of_done = $amount;
        $order -> status         = 'Активная';

        $order-> save();

        return redirect()->route('orders');

    }

    public function removeOrder( $id )
    {
        $order_to_remove = Order::where('id', $id);
        $order_to_remove->delete();

        return redirect()->back();
    }

    public function finishOrder( Request $request)
    {
        $this->validate($request, [
            'order_id'          =>          'required',
            'amount_of_corns'   =>          'required|numeric',
        ]);

        // Define variables
        $order_id           = $request['order_id'];
        $amount_of_corns    = $request['amount_of_corns'];

        //Change current order
        $order_element          = Order::findOrFail(['id' => $order_id])->first();
        $order_element->status  = 'Завершена';
        $order_element->amount_of_done = $amount_of_corns;


        //Change stock element
        $stock_id               =   $order_element->stock_id;
        $stock_element          = Stock::findOrFail(['id' => $stock_id])->first();
        $current_corns          = $stock_element->corns;
        $stock_element->corns   = floatval($current_corns) - floatval($amount_of_corns);

        //If we don't have enough goods in stock then return
        if(floatval($current_corns) - floatval($amount_of_corns) < 0)
        {
            return redirect()
                ->back()
                ->withErrors( ['msg' => 'На складе нет данного колличества']);
        }

        //Save values
        $order_element->save();
        $stock_element->save();

        //Redirect back with success message
        return redirect()
            ->back()
            ->withMessage(['success_msg' => 'Заявка успешно выполена']);

    }
}
