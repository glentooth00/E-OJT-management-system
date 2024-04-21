<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

 
     public function index($status)
     {
         $filtered_students = [];
     
         // Check the status parameter and retrieve students accordingly
         if ($status === 'pending' || $status === 'registered') {
             $filtered_students = Student::where('application_status', $status)->get();
         } else {
             // If an invalid status is provided, default to retrieving all students
             $filtered_students = Student::all();
         }
     
         return view('admin.dashboard', [
             'filtered_students' => $filtered_students,
             'selectedStatus' => $status, // Pass the selected status to the view
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
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function showLoginForm()
    {
        return view('auth.login'); // Assuming you have a view named admin.login
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication passed
            return redirect()->intended(route('admin.dashboard'));
        }
    
        // Authentication failed
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout(); // Logout the admin user
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token
    
        return redirect()->route('site.index'); // Redirect to the site's index page
    }

    public function interns()
    {
        return view('admin.interns.index');
    }

    public function approveStudent(Request $request, Student $student)
    {
        // Update the student's application_status to "registered"
        $student->update(['application_status' => 'registered']);
        
        return redirect()->back()->with('success', 'Student approved successfully.');
    }

    // public function filterStudents($status)
    // {
    //     $filtered_students = Student::where('application_status', $status)->get();
        
    //     return view('admin.dashboard', [
    //         'filtered_students' => $filtered_students,
    //     ]);
    // }


    



}
