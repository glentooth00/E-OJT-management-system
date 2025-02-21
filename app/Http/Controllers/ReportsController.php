<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Course;
use App\Models\DepartmentHead;
use App\Models\Reports;
use App\Models\Student;
use App\Models\YearLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    



     public function index(Request $request)
     {
         // Fetch all courses, year levels, and agencies for filters
         $courses = Course::all();
         $yearLevels = YearLevel::all();
         $agencies = Agency::all();
     
         // Build the query for filtering students
         $students = Student::query()
             ->when($request->course, function ($query) use ($request) {
                 return $query->where('course', $request->course);
             })
             ->when($request->year_level, function ($query) use ($request) {
                 return $query->where('year_level', $request->year_level);
             })
             ->when($request->search, function ($query) use ($request) {
                 return $query->where(function ($q) use ($request) {
                     $q->where('fullname', 'like', '%' . $request->search . '%')
                       ->orWhere('id_number', 'like', '%' . $request->search . '%')
                       ->orWhere('course', 'like', '%' . $request->search . '%');
                 });
             })
             ->when($request->agency, function ($query) use ($request) {
                 return $query->where('designation', $request->agency);
             })
             ->paginate(10); // Paginate with 10 students per page
     
         return view('admin.reports.index', [
             'students' => $students,
             'courses' => $courses,
             'yearLevels' => $yearLevels,
             'agencies' => $agencies,
         ]);
     }
     


// Controller method
public function print(Request $request)
{
    // Start the query with the Student model
    $query = Student::query();

    // Apply search filter
    if ($request->has('search') && $request->search != '') {
        $searchTerm = $request->search;
        $query->where(function($q) use ($searchTerm) {
            $q->where('fullname', 'like', '%' . $searchTerm . '%')
              ->orWhere('id_number', 'like', '%' . $searchTerm . '%')
              ->orWhere('course', 'like', '%' . $searchTerm . '%');
        });
    }

    // Apply course filter
    if ($request->has('course') && $request->course != '') {
        $query->where('course', $request->course);
    }

    // Apply year level filter
    if ($request->has('year_level') && $request->year_level != '') {
        $query->where('year_level', $request->year_level);
    }

    // Apply agency filter
    if ($request->has('agency') && $request->agency != '') {
        $query->where('designation', $request->agency);
    }

    // Get all the filtered students
    $students = $query->get();

    $course = $request->course;

    $department_head = DepartmentHead::where('course', $course)->first();

    // Get logged-in user's data
    $loggedInUser = auth()->user();
    

    // Return the print view with filtered students, department head, and logged-in user's data
    return view('admin.reports.print', [
        'students' => $students,
        'department_head' =>  $department_head,
        'loggedInUser' => $loggedInUser,  // Pass logged-in user's data to the view
    ]);
}



public function DeptHeadprint(Request $request)
{
    // Start the query with the Student model
    $query = Student::query();

    // Apply search filter
    if ($request->has('search') && $request->search != '') {
        $searchTerm = $request->search;
        $query->where(function($q) use ($searchTerm) {
            $q->where('fullname', 'like', '%' . $searchTerm . '%')
              ->orWhere('id_number', 'like', '%' . $searchTerm . '%')
              ->orWhere('course', 'like', '%' . $searchTerm . '%');
        });
    }

    // Apply course filter
    if ($request->has('course') && $request->course != '') {
        $query->where('course', $request->course);
    }

    // Apply year level filter
    if ($request->has('year_level') && $request->year_level != '') {
        $query->where('year_level', $request->year_level);
    }

    // Apply agency filter
    if ($request->has('agency') && $request->agency != '') {
        $query->where('designation', $request->agency);
    }

    // Get all the filtered students
    $students = $query->get();

    $course = $request->course;

    $department_head = DepartmentHead::where('course', $course)->first();

    // Get logged-in user's data
    $loggedInUser = auth()->user();
    

    // Return the print view with filtered students, department head, and logged-in user's data
    return view('department_head.report.print', [
        'students' => $students,
        'department_head' =>  $department_head,
        'loggedInUser' => $loggedInUser,  // Pass logged-in user's data to the view
    ]);
}


     
     

 public function deptHeadReport(Request $request){
    $query = Student::query();
     
    // Fetch all courses and year levels for filters
    $courses = Course::all();
    $yearLevels = YearLevel::all();

    $students = Student::query()
        ->when($request->course, function ($query) use ($request) {
            return $query->where('course', $request->course);
        })
        ->when($request->year_level, function ($query) use ($request) {
            return $query->where('year_level', $request->year_level);
        })
        ->when($request->search, function ($query) use ($request) {
            return $query->where('fullname', 'like', '%' . $request->search . '%')
                ->orWhere('id_number', 'like', '%' . $request->search . '%');
        })
        ->paginate(10);  // Paginate with 5 students per page

    return view('department_head.report.index', [
        'students' => $students,
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reports $reports)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reports $reports)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reports $reports)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reports $reports)
    {
        //
    }
}
