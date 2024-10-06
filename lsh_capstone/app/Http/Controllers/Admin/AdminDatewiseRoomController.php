<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\BookedRoom;

class AdminDatewiseRoomController extends Controller
{
    // Display the index view
    public function index()
    {
        return view('admin.datewise_rooms');
    }

    // Show the details of rooms booked on a selected date
    public function show(Request $request) 
    {
        // Validate the incoming request data
        $request->validate([
            'selected_date' => 'required'
        ]);

        // Get the selected date from the request
        $selected_date = $request->selected_date;

        // Pass the selected date to the view
        return view('admin.datewise_rooms_detail', compact('selected_date'));
    }
}

