<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\Request;

class AgencyController extends Controller
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
        $validatedData = $request->validate([
            'agency_name' => 'nullable|string|max:255',
            'agency_email' => 'nullable|email|max:255|unique:agencies,agency_email',
            'agency_contact' => 'nullable|string|max:20', // Adjust max length as necessary
            'agency_supervisor' => 'nullable|string|max:255',
            'status' => 'required|string|in:Active,Inactive' // Change as needed
        ]);
    
        // Remove any backticks from the supervisor's name
        $validatedData['agency_supervisor'] = str_replace('`', '', $validatedData['agency_supervisor']);
    
        // Create the new agency entry
        Agency::create($validatedData);
    
        // Optionally, set a flash message or return a response
        return redirect()->back()->with('success', 'Agency added successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Agency $agency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agency $agency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Find the agency by ID
        $agency = Agency::findOrFail($request->id);
    
        // Validate the incoming data
        $validatedData = $request->validate([
            'agency_name' => 'required|string|max:255',
            'agency_email' => 'required|email|max:255|unique:agencies,agency_email,' . $request->id, // Exclude current email
            'agency_contact' => 'required|string', // Matches Philippine contact number format starting with 09
            'agency_supervisor' => 'required|string|max:255',
            'status' => 'required|in:Active,Inactive', // Ensures status is either 'Active' or 'Inactive'
        ]);
    
        // Update agency fields
        $agency->agency_name = $request->input(key: 'agency_name');
        $agency->agency_email = $request->input('agency_email');
        $agency->agency_contact = $request->input('agency_contact');
        $agency->agency_supervisor = $request->input('agency_supervisor');
        $agency->status = $request->input('status');
    
        // Save the updated agency
        $agency->save();
    
        // Redirect back with a success message
        return back()->with('success', 'Agency updated successfully!');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agency $agency)
    {
        // Delete the agency record
        $agency->delete();
    
        // Redirect with success message
        return back()->with('success', 'Agency deleted successfully!');
    }
    
}
