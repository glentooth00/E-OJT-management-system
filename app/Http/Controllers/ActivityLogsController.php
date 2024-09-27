<?php

namespace App\Http\Controllers;

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

        $students = Student::where('application_status', 'Registered' )
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
    public function show(ActivityLogs $activityLogs)
    {
        //
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
