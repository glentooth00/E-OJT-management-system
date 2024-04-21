<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function interns()
    {
        return view('admin.interns.index');
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
    

}
