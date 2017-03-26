<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function addCustomer(Request $request) {
        $this->validate($request, [
            'input-user-name'       => 'required',
            'input-address'         => 'required',
            'input-user-contacts'   => 'required'
        ]);

        $customer = new Customer();

        $customer->name             =   $request['input-user-name'];
        $customer->customer_address =   $request['input-address'];
        $customer->contacts         =   $request['input-user-contacts'];
        $customer->save();

        return redirect()->back();
    }

    public function getCustomers() {
        $customers = Customer::all();

        return view('home', [
           'customers' => $customers
        ]);
    }

    public function removeCustomer( $customer_id ) {
        $customer_to_remove = Customer::where( 'id', $customer_id );
        $customer_to_remove->delete();

        return redirect()->back();
    }

    public function updateCustomer(Request $request)
    {
        $this->validate($request, [
            'customer_id'       => 'required',
            'customer_name'     => 'required',
            'customer_address'  => 'required',
            'contacts'          => 'required'
        ]);

        $customer_id            = $request['customer_id'];
        $customer_name          = $request['customer_name'];
        $customer_address       = $request['customer_address'];
        $customer_contacts      = $request['contacts'];

        $Customer = Customer::findOrFail(['id' => $customer_id])->first();
        $Customer->name             = $customer_name;
        $Customer->customer_address = $customer_address;
        $Customer->contacts         = $customer_contacts;

        $Customer->save();

        return redirect()->back();


    }
}
