<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Moa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class MoaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $moas = Moa::all();
        $courses = Course::all();
        return view('admin.moa.index', [
            'moas' => $moas,
            'courses' => $courses,
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
            'moa' => 'required|file|mimes:jpg,png,jpeg,pdf|max:2048', // File validation
            'moa_name' => 'required|string|max:255',
            'moa_course' => 'required|string|max:255',
            'moa_status' => 'required|string|max:255',
        ]);
    
        // Handle file upload
        if ($request->hasFile('moa')) {
            $file = $request->file('moa');
            $fileName = time() . '_' . $file->getClientOriginalName();
    
            // Define the path to store the file
            $moaDirectory = public_path('storage/moa');
            
            // Create the directory if it doesn't exist
            if (!File::exists($moaDirectory)) {
                File::makeDirectory($moaDirectory, 0755, true);
            }
    
            // Move the file to the specified directory
            $file->move($moaDirectory, $fileName);
            
            // Prepare data for saving to the database
            $filePath = 'storage/moa/' . $fileName;
        }
    
        // Save the data in the database (assuming you have a model for this)
        Moa::create([
            'moa_name' => $request->input('moa_name'),
            'moa_course' => $request->input('moa_course'),
            'moa_status' => $request->input('moa_status'),
            'moa_file' => $filePath, // Store file path
        ]);
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'MOA and data saved successfully.');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(Moa $moa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Moa $moa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Moa $moa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Moa $moa)
    {
        //
    }
}
