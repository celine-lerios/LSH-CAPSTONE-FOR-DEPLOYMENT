<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class AdminPhotoController extends Controller
{
    // Function to display all photos
    public function index()
    {
        // Retrieve all photos from the database
        $photos = Photo::where('remark', 'active')->get();
        // Return the view for displaying photos with the retrieved data
        return view('admin.photo_view', compact('photos'));
    }

    // Function to display the form for adding a new photo
    public function add()
    {
        // Return the view for adding a new photo
        return view('admin.photo_add');
    }

    // Function to store a newly added photo
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,svg,webp,gif|max:5120'
        ]);

        // Generate a unique name for the photo
        $ext = $request->file('photo')->extension();
        $final_name = time().'.'.$ext;

        // Move the uploaded photo to the uploads directory
        $request->file('photo')->move(public_path('uploads/'),$final_name);

        // Create a new Photo model instance and save it to the database
        $obj = new Photo();
        $obj->photo = $final_name;
        $obj->caption = $request->caption;
        $obj->remark = 'active';
        $obj->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Photo is added successfully!');
    }

    // Function to display the form for editing a photo
    public function edit($id)
    {
        // Retrieve the photo data to be edited
        $photo_data = Photo::where('id',$id)->first();
        // Return the view for editing the photo with the retrieved data
        return view('admin.photo_edit', compact('photo_data'));
    }

    // Function to update a photo
    public function update(Request $request, $id)
    {
        // Retrieve the photo data to be updated
        $obj = Photo::where('id', $id)->first();

        // Check if a new photo file is uploaded
        if($request->hasFile('photo')) {
            // Validate the incoming request
            $request->validate([
                'photo' => 'image|mimes:jpeg,jpg,svg,png,webp,gif|max:5120',
            ]);

            // Delete the old photo file
            unlink(public_path('uploads/'.$obj->photo));

            // Generate a unique name for the new photo
            $ext = $request->file('photo')->extension();
            $final_name = time().'.'.$ext;

            // Move the uploaded photo to the uploads directory
            $request->file('photo')->move(public_path('uploads/'),$final_name);

            // Update the photo file name in the database
            $obj->photo = $final_name;           
        }

        // Update the caption of the photo
        $obj->caption = $request->caption;
        $obj->update();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Photo is updated successfully!');
        
    }

    // Function to delete a photo
    public function delete($id)
    {
        // Retrieve the photo data to be deleted
        $single_data = Photo::where('id', $id)->first();
        // Delete the photo file from the uploads directory
        // unlink(public_path('uploads/'.$single_data->photo));
        $single_data->remark = 'deleted';
        // Delete the photo record from the database
        $single_data->update();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Photo is deleted successfully!');
    }
}
