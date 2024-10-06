<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use App\Models\AccommodationType;
use App\Models\Room;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    // Function to display the accommodation page
    public function index()
    {
        // Retrieve all accommodation types
        $accommodation_types = AccommodationType::where('remark', 'active')->get();

        // Return the view 'front.accommodation' with the accommodation types
        return view('front.accommodation', compact('accommodation_types'));
    }

    // Function to display the details of a specific accommodation type
    public function accommodation_detail($accommtype_id)
    {
        // Retrieve the specific accommodation type based on the id
        $accommodation_type = AccommodationType::where('remark', 'active')->where('id', $accommtype_id)->first();

        // Retrieve all accommodations belonging to the specific accommodation type
        $accommodation_all = Accommodation::where('remark', 'active')->where('status', 'approved')->where('accommodation_type_id', $accommtype_id)->get();

        // Return the view 'front.accommodation_detail' with the accommodation details
        return view('front.accommodation_detail', compact('accommodation_all', 'accommodation_type'));
    }
}
