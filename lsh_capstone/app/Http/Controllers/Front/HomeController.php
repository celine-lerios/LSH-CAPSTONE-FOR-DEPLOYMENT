<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use App\Models\AccommodationType;
use App\Models\Feature;
use App\Models\Post;
use App\Models\Room;
use App\Models\Slide;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Function to display the home page
    public function index()
    {
        // Retrieve all testimonials
        $testimonial_all = Testimonial::where('remark', 'active')->get();

        // Retrieve all slides
        $slide_all = Slide::where('remark', 'active')->get(); 

        // Retrieve all features
        $feature_all = Feature::where('remark', 'active')->get();

        // Retrieve latest 3 posts
        $post_all = Post::where('remark', 'active')->orderBy('id', 'desc')->limit(3)->get();

        // Retrieve latest 4 rooms
        $room_all = Room::where('remark', 'active')->orderBy('id', 'desc')->limit(4)->get();

        // Retrieve all accommodation types
        $accommodation_types = AccommodationType::where('remark', 'active')->get();

        // Tiwasa ang uban nga query

        // Return the home view with the retrieved data
        return view('front.home',compact('slide_all', 'feature_all', 'testimonial_all', 'post_all', 'room_all', 'accommodation_types'));
    }
}
