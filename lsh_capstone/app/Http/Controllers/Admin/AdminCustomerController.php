<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    // Display all customers
    public function index()
    {
        $customers = Customer::get();
        return view('admin.customer', compact('customers'));
    }

    // Change the status of a customer (active/inactive)
    public function change_status($id)
    {
        // Find the customer by ID
        $customer_data = Customer::where('id', $id)->first();
        
        // Toggle the status (1 to 0, 0 to 1)
        if($customer_data->status == 1) {
            $customer_data->status = 0;
        } else {
            $customer_data->status = 1;
        }

        // Update the customer's status
        $customer_data->update();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Customer status has been succesfully changed!');
    }
}
