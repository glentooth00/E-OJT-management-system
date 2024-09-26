<?php

namespace App\Http\Controllers;

use App\Models\Student;
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
}
