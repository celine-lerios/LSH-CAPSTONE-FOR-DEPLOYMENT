<?php

// Declare the namespace for the controller
namespace App\Http\Controllers\Admin;

// Import necessary classes
use App\Http\Controllers\Controller;  // Base controller class
use App\Models\Customer;  // Model for customers
use App\Models\Order;  // Model for orders
use App\Models\Accommodation;  // Model for accommodations
use App\Models\Room;
use App\Models\Subscriber;  // Model for subscribers
use Illuminate\Http\Request;  // Request handling class

// Define the AdminHomeController class, extending the base Controller class
class AdminHomeController extends Controller
{
    // Method to display the admin home dashboard
    public function index()
    {
        // Count the total completed orders
        $total_completed_orders = Order::where('status', 'Completed')->where('remark', 'active')->count();

        // Count the total pending orders
        $total_pending_orders = Order::where('status', 'Pending')->where('remark', 'active')->count();

        // Count the total active customers
        $total_active_customers = Customer::where('status', 1)->count();

        // Count the total pending customers
        $total_pending_customers = Customer::where('status', 0)->count();

        // Count the total rooms
        $total_accommodations = Accommodation::where('remark', 'active')->count();

        // Count the total active subscribers
        $total_subscribers = Subscriber::where('status', 1)->where('remark', 'active')->count();

        $total_pending_accommodations = Accommodation::where('status', 'pending')->where('remark', 'active')->count();

        $total_approved_accommodations = Accommodation::where('status', 'approved')->where('remark', 'active')->count();

        $total_rooms = Room::where('remark', 'active')->count();

        $total_pending_rooms = Room::where('status', 'pending')->where('remark', 'active')->count();

        $total_published_rooms = Room::where('status', 'published')->where('remark', 'active')->count();

        // Retrieve the 5 most recent orders in descending order of their IDs
        $recent_orders = Order::orderBy('id', 'desc')->where('status', 'Completed')->where('remark', 'active')->skip(0)->take(5)->get();

        // Return the 'admin.home' view with all the calculated data
        return view('admin.home', compact('total_completed_orders', 'total_pending_orders', 'total_active_customers', 'total_pending_customers', 'total_accommodations', 'total_subscribers', 'recent_orders', 'total_pending_accommodations', 'total_approved_accommodations', 'total_rooms', 'total_pending_rooms', 'total_published_rooms'));
    }
}
