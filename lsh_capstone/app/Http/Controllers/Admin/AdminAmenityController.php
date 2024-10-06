<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use Illuminate\Http\Request;

class AdminAmenityController extends Controller
{
    // Display all amenities
    public function index()
    {
        $amenities = Amenity::where('remark', 'active')->get();
        return view('admin.amenity_view', compact('amenities'));
    }

    // Display form to add a new amenity
    public function add()
    {
        return view('admin.amenity_add');
    }

    // Store a new amenity
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required',
        ]);

        // Create a new Amenity instance and save it to the database
        $obj = new Amenity();
        $obj->name = $request->name;
        $obj->remark = 'active';
        $obj->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Amenity is added successfully!');
    }

    // Display form to edit an existing amenity
    public function edit($id)
    {
        $amenity_data = Amenity::where('id',$id)->first();
        return view('admin.amenity_edit', compact('amenity_data'));
    }

    // Update an existing amenity
    public function update(Request $request, $id)
    {
        // Find the amenity by ID
        $obj = Amenity::where('id', $id)->first();

        // Update the amenity name
        $obj->name = $request->name;
        $obj->update();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Amenity is updated successfully!');
    }

    // Delete an amenity
    public function delete($id)
    {
        // Find the amenity by ID and delete it
        $single_data = Amenity::where('id', $id)->first();
        $single_data->remark = 'deleted';
        $single_data->update();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Amenity is deleted successfully!');
    }
}
