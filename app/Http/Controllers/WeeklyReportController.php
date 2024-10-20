<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\weeklyReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class WeeklyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the authenticated student's ID
        $student = Auth::guard('student')->user();
        if (!$student) {
            return redirect()->route('login')->withErrors(['message' => 'Please log in to access the dashboard.']);
        }
        $studentId = $student->id;

        // Fetch the weekly reports for the logged-in student
        $weeklyReports = weeklyReport::where('student_id', $studentId)->get();

        // Pass the data to the view
        return view('student.dashboard', [
            'weeklyReports' => $weeklyReports,
            'studentId' => $studentId,
        ]);
    }

    public function reports(Request $request)
    {
        $searchTerm = $request->input('search');
        $course = $request->input('course');
    
        $students = Student::when($searchTerm, function ($query, $searchTerm) {
            return $query->where('fullname', 'LIKE', '%' . $searchTerm . '%');
        })->when($course, function ($query, $course) {
            return $query->where('course', $course);
        })->paginate(10);
    
        return view('department_head.weekly_reports.index', [
            'students' => $students,
            'searchTerm' => $searchTerm,
            'course' => $course,
        ]);
    }

    public function showReports($id) {
        // Get the student by ID
        $students = Student::where('id', $id)->get();
    
        if ($students->isEmpty()) {
            return redirect()->back()->with('error', 'Student not found.');
        }
    
        // Get the start and end date of the latest week
        $endDate = now(); // Current date
        $startDate = now()->subDays(7); // Date 7 days ago
    
        // Get all images for the student from the latest week in descending order
        $images = weeklyReport::where('student_id', $id)
            ->where('status', 'Approved')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('created_at', 'desc') // Order by created_at in descending order
            ->get();
    
        return view('department_head.weekly_reports.show', [
            'students' => $students,
            'images' => $images,
        ]);
    }

//     public function showReports($student_id, $report_id)
// {
//     // Fetch the report based on student_id and report_id
//     $report = WeeklyReport::where('student_id', $student_id)
//                            ->where('id', $report_id)
//                            ->first();

//     if (!$report) {
//         return redirect()->back()->with('error', 'Report not found.');
//     }

//     return view('weekly_reports.view', compact('report'));
// }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view to create a new weekly report
        return view('student.weekly_report.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|integer',
            'studentname' => 'required|string',
            'week_number' => 'required|integer',
            'activityPhotos.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'activityDescription' => 'required|string',
            'day' => 'required|string',
            'day_no' =>  'required|integer',
        ]);
        // dd($validatedData);
    
        $studentId = $request->input('student_id');
        $studentName = $request->input('studentname'); // Corrected variable name
        $weekNumber = $request->input('week_number');
        $day = $request->input('day');
        $day_no = $request->input('day_no');
        $activityDescription = $request->input('activityDescription');
    
        if ($request->hasFile('activityPhotos')) {
            foreach ($request->file('activityPhotos') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('activity_photos', $fileName, 'public');
    
                // Save the report for each uploaded photo
                $weeklyReport = new weeklyReport();
                $weeklyReport->student_id = $studentId;
                $weeklyReport->week_number = $weekNumber;
                $weeklyReport->studentname = $studentName;
                $weeklyReport->activity_description = $activityDescription;
                $weeklyReport->file_path = $filePath; // Store the file path
                $weeklyReport->day = $day;
                $weeklyReport->day_no = $day_no;
                $weeklyReport->status = 'Pending'; // Set status to Pending
                $weeklyReport->save();
            }
        }
    
        return redirect()->route('student.dashboard')->with('success', 'Weekly report created successfully!');
    }
    
    
    // public function summary($student_id, $week_number)
    // {
    //     // Get the activity logs for the entire week for the student
    //     $activity_logs = weeklyReport::where('student_id', $student_id)
    //         ->where('status', 'Approved')
    //         ->where('week_number', $week_number)
    //         ->get();
    
    //     // Check if activity logs are empty
    //     if ($activity_logs->isEmpty()) {
    //         return redirect()->back()->with('error', 'No reports available for this week.');
    //     }
    
    //     // Pass all the necessary data to the view
    //     return view('department_head.weekly_reports.summary', [
    //         'activity_logs' => $activity_logs,
    //         'week_number' => $week_number
    //     ]);
    // }

    public function summary($student_id, $week_number)
    {
        // Get the activity logs for the entire week for the student
        $activity_logs = weeklyReport::where('student_id', $student_id)
            ->where('status', 'Approved')
            ->where('week_number', $week_number)
            ->get();
    
        // Check if activity logs are empty
        if ($activity_logs->isEmpty()) {
            return redirect()->back()->with('error', 'No reports available for this week.');
        }
    
        // Group by day and take the first activity log for each day
        $grouped_logs = $activity_logs->groupBy('day')->map(function ($group) {
            return $group->first();
        });
    
        // Pass all the necessary data to the view
        return view('department_head.weekly_reports.summary', [
            'activity_logs' => $grouped_logs,
            'week_number' => $week_number
        ]);
    }
    

    
    
    
    
    
    

    /**
     * Display the specified resource.
     */
    // public function show($weekNumber)
    // {
    //     // Fetch weekly reports with the given week_number
    //     $weeklyReports = weeklyReport::where('week_number', $weekNumber)->get();
    
    //     // Pass the weekly report data to the view
    //     return view('department_head.weekly_reports.show', compact('weeklyReports', 'weekNumber'));
    // }
    
    
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(weeklyReport $weeklyReport)
    {
        // Return the view to edit the weekly report
        return view('student.weekly_report.edit', compact('weeklyReport'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, weeklyReport $weeklyReport)
    {
        $request->validate([
            'week_number' => 'required|integer',
            'activityDescription' => 'required|string',
        ]);

        $weeklyReport->week_number = $request->input('week_number');
        $weeklyReport->activity_description = $request->input('activityDescription');
        $weeklyReport->save();

        return redirect()->route('student.dashboard')->with('success', 'Weekly report updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(weeklyReport $weeklyReport)
    {
        $weeklyReport->delete();

        return redirect()->route('student.dashboard')->with('success', 'Weekly report deleted successfully!');
    }
}
