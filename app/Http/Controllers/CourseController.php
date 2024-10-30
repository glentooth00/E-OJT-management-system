<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.course.index',[
            'courses' => $courses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all(); // Fetch all courses
        return view('department_head.departmentHead.index', [
            'courses' => $courses,
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $course = $request->validate([
            'course' => 'nullable|string|max:255',
            'course_code' => 'nullable|string|max:255',
            'course_initials' => 'nullable|string|max:255',
        ]);
        
        Course::create($course);

        return redirect()->back()->with('success', 'New Course added successfully.');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Course $course)
    // {
    //     $courses = Course::all();
    //     dd($courses);
    //     return view('department_head.departmentHead.index',[
    //         'courses' => $courses,
    //     ]);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }

// YourController.php
public function getDepartment($course)
{
    $courseData = Course::where('course_initials', $course)->with('department')->first();

    if ($courseData) {
        return response()->json($courseData); // Return the entire course data with department
    } else {
        return response()->json([]); // Return an empty array if not found
    }
}


}
