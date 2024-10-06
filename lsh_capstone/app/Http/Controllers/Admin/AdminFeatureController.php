<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;

class AdminFeatureController extends Controller
{
    // Display all features
    public function index()
    {
        $features = Feature::where('remark', 'active')->get();
        return view('admin.feature_view', compact('features'));
    }

    // Display form to add a new feature
    public function add()
    {
        return view('admin.feature_add');
    }

    // Store a new feature
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'icon' => 'required',
            'heading' => 'required'
        ]);

        // Create a new Feature instance and save it to the database
        $obj = new Feature();
        $obj->icon = $request->icon;
        $obj->heading = $request->heading;
        $obj->text = $request->text;
        $obj->remark = 'active';
        $obj->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Feature is added successfully!');
    }

    // Display form to edit an existing feature
    public function edit($id)
    {
        $feature_data = Feature::where('id',$id)->first();
        return view('admin.feature_edit', compact('feature_data'));
    }

    // Update an existing feature
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'icon' => 'required',
            'heading' => 'required'
        ]);

        // Find the feature by ID
        $obj = Feature::where('id', $id)->first();

        // Update the feature icon, heading, and text
        $obj->icon = $request->icon;
        $obj->heading = $request->heading;
        $obj->text = $request->text;
        $obj->update();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Feature is updated successfully!');
    }

    // Delete a feature
    public function delete($id)
    {
        // Find the feature by ID and delete it
        $single_data = Feature::where('id', $id)->first();
        $single_data->remark = 'deleted';
        $single_data->update();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Feature is deleted successfully!');
    }
}
