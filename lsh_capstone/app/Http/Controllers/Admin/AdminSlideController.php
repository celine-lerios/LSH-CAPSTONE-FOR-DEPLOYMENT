<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;

class AdminSlideController extends Controller
{
    // Function to display all slides
    public function index()
    {
        $slides = Slide::where('remark', 'active')->get();
        return view('admin.slide_view', compact('slides'));
    }

    // Function to show the form for adding a new slide
    public function add()
    {
        return view('admin.slide_add');
    }

    // Function to store a newly created slide in the database
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,svg,webp,gif|max:5120'
        ]);

        // Move the uploaded file to the public/uploads directory
        $ext = $request->file('photo')->extension();
        $final_name = time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);

        // Create a new Slide instance and save it to the database
        $obj = new Slide();
        $obj->photo = $final_name;
        $obj->heading = $request->heading;
        $obj->text = $request->text;
        $obj->button_text = $request->button_text;
        $obj->button_url = $request->button_url;
        $obj->remark = 'active';
        $obj->save();

        return redirect()->back()->with('success', 'Slide is added successfully!');
    }

    // Function to show the form for editing a slide
    public function edit($id)
    {
        $slide_data = Slide::where('id',$id)->first();
        return view('admin.slide_edit', compact('slide_data'));
    }

    // Function to update the specified slide in the database
    public function update(Request $request, $id)
    {
        // Find the slide by ID
        $obj = Slide::where('id', $id)->first();

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

        // Update the slide's details
        $obj->heading = $request->heading;
        $obj->text = $request->text;
        $obj->button_text = $request->button_text;
        $obj->button_url = $request->button_url;
        $obj->update();

        return redirect()->back()->with('success', 'Slide is updated successfully!');
        
    }

    // Function to delete the specified slide from the database
    public function delete($id)
    {
        // Find the slide by ID
        $single_data = Slide::where('id', $id)->first();

        // Delete the associated photo from the public/uploads directory
        //unlink(public_path('uploads/'.$single_data->photo));
        $single_data->remark = 'deleted';

        // Delete the slide from the database
        $single_data->update();

        return redirect()->back()->with('success', 'Slide is deleted successfully!');
    }
    
}
