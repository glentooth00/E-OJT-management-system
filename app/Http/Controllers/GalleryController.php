<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\WeeklyReport;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
       $students = Student::all();
        return view('department_head.gallery.index', [
            'students' => $students,
        ]);
    }

    // public function show($id){

    //     $students = Student::where('id', $id)->get();

    //     if (!$students) {
    //         return redirect()->back()->with('error', 'Student not found.');
    //     }

    //     $images = WeeklyReport::where('student_id', $id)->get();

    //     return view('department_head.gallery.show', [
    //         'students' => $students,
    //         'images' => $images,
    //     ]);

    // }

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
