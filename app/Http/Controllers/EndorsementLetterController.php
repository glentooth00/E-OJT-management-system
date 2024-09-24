<?php

namespace App\Http\Controllers;

use App\Models\EndorsementLetter;
use Illuminate\Http\Request;

class EndorsementLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $letters =  EndorsementLetter::all();
        return view('admin.endorsement.index', [
            'letters' => $letters,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'letter' => 'required|file|mimes:pdf,jpeg,png,jpg,gif|max:2048', // Validate for file types and size
            'letter_course' => 'required|string|max:255',
            'letter_status' => 'required|in:Active,Deactivated',
        ]);

   
        // Handle the file upload
        if ($request->hasFile('letter')) {
            // Store the file in 'public/letter' directory and get the file path
            $filePath = $request->file('letter')->store('letter', 'public');

        }
    
        // // Create a new record in the database
        $endorsement = new EndorsementLetter();
        $endorsement->letter = 'storage/' . $filePath; // Store the file path to the letter column
        $endorsement->letter_course = $request->input('letter_course'); // Save the course
        $endorsement->letter_status = $request->input('letter_status'); // Save the status
        $endorsement->save();
    
        return back()->with('success', 'Letter and details uploaded successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(EndorsementLetter $endorsementLetter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EndorsementLetter $endorsementLetter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EndorsementLetter $endorsementLetter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EndorsementLetter $endorsementLetter)
    {
        //
    }
}
