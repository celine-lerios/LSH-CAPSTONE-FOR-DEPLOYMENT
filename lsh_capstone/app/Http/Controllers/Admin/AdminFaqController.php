<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class AdminFaqController extends Controller
{
    // Display all FAQs
    public function index()
    {
        $faqs = Faq::where('remark', 'active')->get();
        return view('admin.faq_view', compact('faqs'));
    }

    // Display form to add a new FAQ
    public function add()
    {
        return view('admin.faq_add');
    }

    // Store a new FAQ
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        // Create a new Faq instance and save it to the database
        $obj = new Faq();
        $obj->question = $request->question;
        $obj->answer = $request->answer;
        $obj->remark = 'active';
        $obj->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'FAQ is added successfully!');
    }

    // Display form to edit an existing FAQ
    public function edit($id)
    {
        $faq_data = Faq::where('id',$id)->first();
        return view('admin.faq_edit', compact('faq_data'));
    }

    // Update an existing FAQ
    public function update(Request $request, $id)
    {
        // Find the FAQ by ID
        $obj = Faq::where('id', $id)->first();

        // Update the FAQ question and answer
        $obj->question = $request->question;
        $obj->answer = $request->answer;
        $obj->update();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'FAQ is updated successfully!');
    }

    // Delete a FAQ
    public function delete($id)
    {
        // Find the FAQ by ID and delete it
        $single_data = Faq::where('id', $id)->first();
        $single_data->remark = 'deleted';
        $single_data->update();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'FAQ is deleted successfully!');
    }
}
