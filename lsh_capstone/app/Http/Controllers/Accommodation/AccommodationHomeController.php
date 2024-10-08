<?php

namespace App\Http\Controllers\Accommodation;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use App\Models\AccommodationRate;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccommodationHomeController extends Controller
{
    public function index()
    {
        // Retrieve accommodation info for the authenticated user
        $accommodation_info = Accommodation::where('id', Auth::guard('accommodation')->user()->id)->first();

        // Get the logged-in accommodation ID
        $accommodation_id = Auth::guard('accommodation')->user()->id;

        // Retrieve the room IDs belonging to this accommodation
        $room_ids = Room::where('remark', 'active')->where('accommodation_id', $accommodation_id)->pluck('id');

        $total_orders = Order::where('accommodation_id', $accommodation_id)->where('remark', 'active')->count();

        // Retrieve the order details for these rooms
        $total_completed_orders = Order::where('accommodation_id', $accommodation_id)->where('status', 'Completed')->where('remark', 'active')->count();


        $total_pending_orders = Order::where('accommodation_id', $accommodation_id)->where('status', 'Pending')->where('remark', 'active')->count();

        $total_declined_orders = Order::where('accommodation_id', $accommodation_id)->where('status', 'Declined')->where('remark', 'active')->count();

        $total_rooms = Room::where('accommodation_id', Auth::guard('accommodation')->user()->id)->count();


        $recent_orders = Order::where('accommodation_id', $accommodation_id)->where('status', 'Completed')->where('remark', 'active')->orderBy('id', 'desc')
        ->take(5)->get();


        // Retrieve the total count of reviews (accommodation rates) submitted by the authenticated customer
        $total_reviews = AccommodationRate::where('accommodation_id', Auth::guard('accommodation')->user()->id)
                                        ->where('remark', 'active')
                                        ->count();

        return view('accommodation.home', compact('total_rooms', 'total_reviews', 'total_orders','total_completed_orders', 'total_pending_orders', 'total_declined_orders', 'recent_orders'));
    }
}
