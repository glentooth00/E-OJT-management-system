<?php

namespace App\Http\Controllers;

use App\Models\YearLevel;
use App\Models\Course;
use Illuminate\Http\Request;

class YearLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses =  Course::all();
        $yearLevels = YearLevel::all();

        return view('admin.year_level.index', [
            'courses' => $courses,
            'yearLevels' => $yearLevels,
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
        $yearLevel = $request->validate([
            'year_level' => 'nullable|string|max:255',
            'course' => 'nullable|string|max:255',
            'section' => 'nullable|string|max:255',
        ]);

        YearLevel::create($yearLevel);

        return redirect()->back()->with('success', 'Year/Level  created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(YearLevel $yearLevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(YearLevel $yearLevel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, YearLevel $yearLevel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(YearLevel $yearLevel)
    {
        //
    }
}
