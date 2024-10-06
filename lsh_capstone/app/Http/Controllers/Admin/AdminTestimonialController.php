<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AdminTestimonialController extends Controller
{
    // Function to display all testimonials
    public function index()
    {
        $testimonials = Testimonial::where('remark', 'active')->get();
        return view('admin.testimonial_view', compact('testimonials'));
    }

    // Function to show the form for adding a new testimonial
    public function add()
    {
        return view('admin.testimonial_add');
    }

    // Function to store a newly created testimonial in the database
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,svg,webp,gif|max:5120',
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required'
        ]);

        // Move the uploaded file to the public/uploads directory
        $ext = $request->file('photo')->extension();
        $final_name = time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);

        // Create a new Testimonial instance and save it to the database
        $obj = new Testimonial();
        $obj->photo = $final_name;
        $obj->name = $request->name;
        $obj->designation = $request->designation;
        $obj->comment = $request->comment;
        $obj->remark = 'active';
        $obj->save();

        return redirect()->back()->with('success', 'Testimonial is added successfully!');
    }

    // Function to show the form for editing a testimonial
    public function edit($id)
    {
        $testimonial_data = Testimonial::where('id',$id)->first();
        return view('admin.testimonial_edit', compact('testimonial_data'));
    }

    // Function to update the specified testimonial in the database
    public function update(Request $request, $id)
    {
        // Find the testimonial by ID
        $obj = Testimonial::where('id', $id)->first();

        // If a new photo is uploaded, validate and replace the existing photo
        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpeg,jpg,svg,png,webp,gif|max:5120',
            ]);

            unlink(public_path('uploads/'.$obj->photo));

            $ext = $request->file('photo')->extension();
            $final_name = time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'),$final_name);

            $obj->photo = $final_name;           
        }

        // Update the testimonial's details
        $obj->name = $request->name;
        $obj->designation = $request->designation;
        $obj->comment = $request->comment;
        $obj->update();

        return redirect()->back()->with('success', 'Testimonial is updated successfully!');
    }

    // Function to delete the specified testimonial from the database
    public function delete($id)
    {
        // Find the testimonial by ID
        $single_data = Testimonial::where('id', $id)->first();

        // Delete the associated photo from the public/uploads directory
        // ?unlink(public_path('uploads/'.$single_data->photo));
        $single_data->remark = 'deleted';

        // Delete the testimonial from the database
        $single_data->update();

        return redirect()->back()->with('success', 'Testimonial is deleted successfully!');
    }
}
