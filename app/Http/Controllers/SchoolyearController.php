<?php

namespace App\Http\Controllers;

use App\Models\Schoolyear;
use Illuminate\Http\Request;

class SchoolyearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $schoolYears = Schoolyear::all();

        return view('department_head.school_year.index',[
            'schoolYears' => $schoolYears,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schoolYears = Schoolyear::all();
        return view('department_head.school_year.index',[
            'schoolYears' => $schoolYears,
        ]);
    }

    // Handle the form submission to store a new school year
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'school_year' => 'required|string|max:255',
        ]);


        //Store the new school year
        //Assuming you have a SchoolYear model
        $schoolYear = new Schoolyear();
        $schoolYear->school_year = $request->input('school_year');
        $schoolYear->save();

        //Redirect back with a success message
        return redirect()->route('department_head.school_year.create')->with('success', 'School year added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Schoolyear $schoolyear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schoolyear $schoolyear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schoolyear $schoolyear)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schoolyear $schoolyear)
    {
        //
    }
}
