<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Document;
use App\Models\Schoolyear;
use App\Models\Student;
use App\Models\weeklyReport;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all school years in descending order
        $school_years = Schoolyear::orderBy('school_year', 'desc')->get();
    
        // Get all students
        $students = Student::all();
    
        return view('admin.archives.index', [
            'school_years' => $school_years,
            'students' => $students,
        ]);
    }

    public function filterStudents(Request $request)
    {
        $schoolYear = $request->input('school_year');
        $course = $request->input('course');

        $query = Student::query();

        if ($schoolYear) {
            $query->where('school_year', $schoolYear);
        }

        if ($course) {
            $query->where('course', $course);
        }

        $students = $query->get();
        $school_years = Schoolyear::all();

        return view('admin.archives.index', [
            'school_years' => $school_years,
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
    public function show(Archive $archive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Archive $archive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Archive $archive)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Archive $archive)
    {
        //
    }

    // public function showStudent($id)
    // {
    //     $student = Student::findOrFail($id);
    //     $student_activities = WeeklyReport::where('student_id', $id)->get();
    
    //     return view('admin.archives.show', [
    //         'student' => $student,
    //         'student_activities' => $student_activities,
    //     ]);

    // }

    public function showStudent($id)
    {
        // Retrieve the student
        $student = Student::findOrFail($id);

        // Retrieve the student's activities
        $student_activities = weeklyReport::where('student_id', $id)->get();

        // Retrieve the student's documents
        $student_documents = Document::where('student_id', $id)->get();

        // Pass the data to the view
        return view('admin.archives.show', [
            'student' => $student,
            'student_activities' => $student_activities,
            'student_documents' => $student_documents,
        ]);
    }
}
