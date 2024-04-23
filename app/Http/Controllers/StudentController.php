<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // Validate the incoming request data
        $validatedData = $request->validate([
            'fullname' => 'nullable|string|max:255',
            'username' => 'nullable|string|unique:students|max:255',
            'email' => 'nullable|email|unique:students|max:255',
            'password' => 'nullable|string|min:8',
            'course' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'id_number' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'contact_number' => 'nullable|string|max:20',
            'dob' => 'nullable|date',
            'sex' => 'nullable|string|in:MALE,FEMALE',
            'id_attachment' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
            'application_status' => 'nullable|string' // Define validation rule for application_status
        ]);
        
        // Set default value for application_status if not provided in the request
        $validatedData['application_status'] = 'pending';
        $validatedData['role'] = 'student';
        
        // Handle ID attachment upload if provided
   // Handle ID attachment upload if provided
    if ($request->hasFile('id_attachment')) {
        $file = $request->file('id_attachment');
        $fileName = $file->getClientOriginalName(); // Get the original file name
        $filePath = $file->storeAs('public/id_attachments', $fileName); // Store the file in the specified storage folder
        // Remove 'public/' from the beginning of the file path
        $validatedData['id_attachment'] = str_replace('public/', '', $filePath); 
    }

    // Create a new student record
    $student = Student::create($validatedData);

    // Redirect or return a response
    return redirect()->route('site.index')->with('success', 'Student registered successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
