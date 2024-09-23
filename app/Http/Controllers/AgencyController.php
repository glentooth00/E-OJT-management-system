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
            'agency_name' => 'required|string|max:255',
            'agency_email' => 'required|email|max:255|unique:agencies,agency_email',
            'agency_contact' => 'required|string|max:20', // Adjust max length as necessary
            'agency_supervisor' => 'required|string|max:255',
            'status' => 'required|string|in:Active,Inactive' // Change as needed
        ]);

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
    public function update(Request $request, Agency $agency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agency $agency)
    {
        //
    }
}
