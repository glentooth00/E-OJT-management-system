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
        // Get the student by ID
        $students = Student::where('id', $id)->get();
    
        if ($students->isEmpty()) {
            return redirect()->back()->with('error', 'Student not found.');
        }
    
        // Get the start and end date of the latest week
        $endDate = now(); // Current date
        $startDate = now()->subDays(7); // Date 7 days ago
    
        // Get all images for the student from the latest week in descending order
        $images = WeeklyReport::where('student_id', $id)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('created_at', 'desc') // Order by created_at in descending order
            ->get();
    
        return view('department_head.gallery.show', [
            'students' => $students,
            'images' => $images,
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
        $images = WeeklyReport::where('student_id', $id)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('created_at', 'desc') // Order by created_at in descending order
            ->get();
    
        return view('department_head.weekly_reports.show', [
            'students' => $students,
            'images' => $images,
        ]);
    }
    
    
    
    
}
