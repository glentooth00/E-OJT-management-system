<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\weeklyReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WeeklyReportController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Fetch the specific weekly report based on the ID
        $weeklyReport = WeeklyReport::find($id);
    
        // Check if the weekly report exists
        if (!$weeklyReport) {
            return abort(404); // Or any other error handling logic
        }
    
        // Pass the weekly report data to the view
        return view('student.weekly-report.show', compact('weeklyReport'));
    }
    
    
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(weeklyReport $weeklyReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, weeklyReport $weeklyReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(weeklyReport $weeklyReport)
    {
        //
    }

    public function uploadImgs(Request $request)
    {
        $validatedData = $request->validate([
            'weekNumber' => 'required|integer|min:1',
            'activityDescription' => 'required|string|max:255',
            'activityPhoto.*' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
        ]);
    
        // Get the authenticated student's ID
        $studentId = Auth::id();
    
        // Process each uploaded file
        if ($request->hasFile('activityPhoto')) {
            foreach ($request->file('activityPhoto') as $file) {
                // Handle each file
                $fileName = $file->getClientOriginalName();
                $filePath = $file->storeAs('public/id_attachments', $fileName); // Store the file in the specified storage folder
    
                // Save file path, weekNumber, activityDescription, and student_id to database
                $weeklyReport = new WeeklyReport();
                $weeklyReport->file_path = $filePath;
                $weeklyReport->week_number = $validatedData['weekNumber'];
                $weeklyReport->activity_description = $validatedData['activityDescription'];
                $weeklyReport->student_id = $studentId; // Assign the student_id
                $weeklyReport->save();
            }
        }
    
        return redirect()->back()->with('success', 'Files uploaded successfully.');
    }
}