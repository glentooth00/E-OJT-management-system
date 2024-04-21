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

 
     public function index()
     {
        $registered_students = Student::all();
         return view('admin.dashboard',[
            'registered_students' =>  $registered_students,
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
    



}
