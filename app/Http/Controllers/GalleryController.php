<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\WeeklyReport;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');
        $course = $request->input('course');
    
        $students = Student::when($searchTerm, function ($query, $searchTerm) {
            return $query->where('fullname', 'LIKE', '%' . $searchTerm . '%');
        })->when($course, function ($query, $course) {
            return $query->where('course', $course);
        })->paginate(10);
    
        return view('department_head.gallery.index', [
            'students' => $students,
            'searchTerm' => $searchTerm,
            'course' => $course,
        ]);
    }
    
    

    public function show($id) {
        $students = Student::where('id', $id)->get();
    
        if (!$students) {
            return redirect()->back()->with('error', 'Student not found.');
        }
    
        // Get all images for the student
        $images = WeeklyReport::where('student_id', $id)->get();
    
        return view('department_head.gallery.show', [
            'students' => $students,
            'images' => $images,
        ]);
    }
    
    
}
