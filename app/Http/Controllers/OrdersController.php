<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function getAllElementsInOrders ()
    {
        Order::all();

        return view('orders');
    }
}
