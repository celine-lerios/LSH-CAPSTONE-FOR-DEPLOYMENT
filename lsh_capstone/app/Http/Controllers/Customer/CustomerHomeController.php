<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\RoomRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerHomeController extends Controller
{
    // Function to display the customer's home page
    public function index()
    {
        // Count the total completed orders for the authenticated customer
        $total_completed_orders = Order::where('status','Completed')->where('customer_id',Auth::guard('customer')->user()->id)->count();

        // Count the total pending orders for the authenticated customer
        $total_pending_orders = Order::where('status','Pending')->where('customer_id',Auth::guard('customer')->user()->id)->count();

        $total_reviews = RoomRate::where('customer_id',Auth::guard('customer')->user()->id)->count(); 

        // Retrieve the 5 most recent orders for the authenticated customer, ordered by ID in descending order
        $recent_orders = Order::where('customer_id', Auth::guard('customer')->user()->id)
                              ->where('status', 'Completed')
                              ->orderBy('id', 'desc')
                              ->skip(0)
                              ->take(5)
                              ->get();

        // Return the view with the total completed and pending orders
        return view('customer.home', compact('total_completed_orders','total_pending_orders','total_reviews', 'recent_orders'));
    }
}
