<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;

class CustomerOrderController extends Controller
{
    // Function to display all orders of the authenticated customer
    public function index()
    {
        $completed_orders = Order::where('customer_id',Auth::guard('customer')->user()->id)->where('status', 'Completed')->get();
        return view('customer.orders', compact('completed_orders'));
    }

    public function pending_order()
    {
        $pending_orders = Order::where('customer_id', Auth::guard('customer')->user()->id)
                    ->where('status', 'Pending')
                    ->get();

        return view('customer.pending_orders', compact('pending_orders'));
    }

    public function declined_order()
    {
        $declined_orders = Order::where('customer_id', Auth::guard('customer')->user()->id)
                    ->where('status', 'Declined')
                    ->get();

        return view('customer.declined_orders', compact('declined_orders'));
    }

    // Function to display the invoice for a specific order
    public function invoice($id)
    {
        $order = Order::where('id', $id)->first();
        $order_detail = OrderDetail::where('order_id',$id )->get();
        return view('customer.invoice', compact('order', 'order_detail'));
    }
}
