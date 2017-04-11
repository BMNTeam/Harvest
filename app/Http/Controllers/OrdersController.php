<?php

namespace App\Http\Controllers;

use App\Order;
use App\Stock;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function getAllElementsInOrders ()
    {
        $orders = Order::all();

        //Check if order exist without action more that 10 days
        foreach( $orders as $order)
        {
            //Get order updated date and current date
            $order_updated_date = Carbon::parse($order->updated_at);
            $time_now     = Carbon::now();

            //If pass more than 10 days change order status to
            //out of service
            if( $order->status !== 'Выполнена' &&
                $order_updated_date->diffInDays( $time_now) >= 10 )
            {
                $order->status = 'Просрочена';
            }

            // Add attribute to Order object for SORT on the front end
            // also added css classes
            switch ( $order->status )
            {
                case "Активная":
                    $order->order = 1;
                    $order->css_class = 'active-table';
                    break;
                case "Просрочена":
                    $order->order = 0;
                    $order->css_class = 'overdue-table';
                    break;
                case "Выполнена":
                    $order->order = 2;
                    $order->css_class = 'success-table';
                    break;
            }
        }

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
            'amount_of_corns'   =>          'required',
        ]);



        // Define variables
        $order_id           = $request['order_id'];
        $amount_of_corns    = floatval($request['amount_of_corns']);

        //Change current order
        $order_element          = Order::findOrFail(['id' => $order_id])->first();
        $order_element->status  = 'Выполнена';
        $order_element->amount_of_done = $amount_of_corns;

        //Change stock element
        $stock_id               = $order_element->stock_id;
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


    public function updateOrder ($id)
    {
        $order = Order::findOrFail(['id' => $id ])->first();
        $order->updated_at = Carbon::now();
        $order->save();

        return redirect()->back();
    }
}
