<?php

namespace App\Http\Controllers;

use App\Models\ActivityLogs;
use App\Models\Student;
use App\Models\weeklyReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $supervisor = Auth::guard('supervisor')->user();

        $office = $supervisor->office;

        // $students = Student::where('application_status', 'registered' )
        //                     ->where('designation', $office)
        //                     ->get();

        $students = Student::where('application_status', 'registered')
            ->where('designation', $office)
            ->with('weeklyReports') // Eager load the weeklyReports relationship
            ->get();


        return view('supervisor.interns.index', [
            'students' => $students,
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Retrieve the student's weekly report
        $students = Student::where('id', $id)->get();
    
        // Retrieve all activity logs or images related to the student
        $images = weeklyReport::where('student_id', $id)->get();
    
        // If images are not empty, get the week number from the first image
        $weekNumber = $images->isNotEmpty() ? $images[0]->week_number : 'N/A';
    
        // Return data to the Blade view
        return view('supervisor.interns.show', [
            'images' => $images,  // Pass images to the view
            'weekNumber' => $weekNumber,
            'students' => $students,
        ]);
    }
    
    public function supervisorSummary($student_id, $day, $day_no, $week_number)
    {
        // dd($student_id, $day_no, $day, $week_number);
    
        $activity_logs = weeklyReport::where('student_id', $student_id)
            ->where('day', $day_no)
            ->where('day_no', $day)
            ->where('week_number', $week_number)
            ->whereIn('status', ['Approved', 'Pending']) // Change here
            ->get();  // Check if this works

            // dd($activity_logs);
    
        return view('supervisor.interns.summary', [
            'activity_logs' => $activity_logs,
            'day' => $day_no,
            'day_no' => $day,
        ]);
    }
    

    public function approve($id)
    {
        // Find the student by ID
        $student = Student::find($id);
    
        // Check if the student exists
        if (!$student) {
            return redirect()->back()->with('error', 'Student not found.');
        }
    
        // Find all pending weekly reports for the student
        $updatedRows = weeklyReport::where('student_id', $student->id)
            ->where('status', 'Pending') // Ensure you are only updating 'pending' status
            ->update(['status' => 'Approved']); // Update status to 'Approve'
    
        // Check if any rows were updated
        if ($updatedRows > 0) {
            return redirect()->back()->with('success', 'All pending records updated to approved successfully!');
        }
    
        return redirect()->back()->with('error', 'No pending records found for this student.');
    }
    
    
    
    
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ActivityLogs $activityLogs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ActivityLogs $activityLogs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActivityLogs $activityLogs)
    {
        //
    }
}
