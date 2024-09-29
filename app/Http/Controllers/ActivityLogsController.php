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
    public function index()
    {

        $supervisor = Auth::guard('supervisor')->user();

        $office = $supervisor->office;

        $students = Student::where('application_status', 'registered' )
                            ->where('designation', $office)
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
        $student_id = $id;
    
        // Retrieve all matching records as a collection
        $activity_logs = weeklyReport::where('student_id', $student_id)
                                     ->where('status', 'Pending')
                                     ->get();
    
        // If activity_logs is not empty, get the week_number from the first log
        $weekNumber = $activity_logs->isNotEmpty() ? $activity_logs[0]->week_number : 'N/A';
    
        return view('supervisor.interns.show', [
            'activity_logs' => $activity_logs,
            'weekNumber' => $weekNumber,
        ]);
    }
    

    public function approve($id){

        $daily_activity

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
