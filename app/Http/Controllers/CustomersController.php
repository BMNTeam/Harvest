<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function addCustomer(Request $request) {
        $this->validate($request, [
            'input-user-name'       => 'required',
            'input-user-contacts'   => 'required'
        ]);

        $customer = new Customer();

        $customer->name = $request['input-user-name'];
        $customer->contacts = $request['input-user-contacts'];
        $customer->save();

        return redirect()->back();
    }

    public function getCustomers() {
        $customers = Customer::all();

        return view('home', [
           'customers' => $customers
        ]);
    }
}
