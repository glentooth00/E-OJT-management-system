<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Agency;
use App\Models\Department;
use App\Models\EndorsementLetter;
use App\Models\Moa;
use App\Models\Student;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Ensure Hash facade is imported


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

 
     public function index(Request $request, $status = null)
     {
         $filtered_students = [];
     
         if ($status === 'pending' || $status === 'registered') {
             $filtered_students = Student::where('application_status', $status)->get();
         } else {
             $filtered_students = Student::all();
             $status = ''; // Set status to empty string for the "All" option
         }

         $registered_students_no = Student::where('application_status', 'registered')->count();
         $pending_students_no = Student::where('application_status', 'pending')->count();
     
         $agencies =  Agency::all();

         $letters = EndorsementLetter::all();

         $moas = Moa::all();

         $no_agencies = Agency::all()->count();

      


         return view('admin.dashboard', [
             'filtered_students' => $filtered_students,
             'selectedFilter' => $status, // Pass the selected status as selectedFilter
             'registered_students_no' =>  $registered_students_no,
             'pending_students_no' => $pending_students_no,
             'agencies' => $agencies,
             'letters' => $letters,
             'moas' => $moas,
             'no_agencies' => $no_agencies,
            
         ]);
     }

     public function add_ojt_supervisor(){

        $ojt_supervisors = Admin::get();
        
        return view('admin.ojt_supervisor.index',[
            'ojt_supervisors' => $ojt_supervisors
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
    // Validate the incoming request to ensure required fields are provided
    $validated = $request->validate([
        'firstname' => 'required|string|max:255',
        'middlename' => 'nullable|string|max:255',
        'lastname' => 'required|string|max:255',
        'username' => 'nullable|max:255', // Ensure username is unique
        'password' => 'required|string|min:6', // Minimum length for password
    ]);

    // Combine firstname, middlename, and lastname to create the full name
    $fullName = trim($request->input('firstname') . ' ' . $request->input('middlename') . ' ' . $request->input('lastname'));

    // Hash the password before storing it
    $hashedPassword = Hash::make($request->input('password'));

    // Create a new OJT supervisor with the combined name, default role, and hashed password
    Admin::create([
        'firstname' => $request->input('firstname'),
        'middlename' => $request->input('middlename'),
        'lastname' => $request->input('lastname'),
        'username' => $request->input('username'),
        'name' => $fullName, // Full name
        'role' => 'admin',   // Default role
        'password' => $hashedPassword,  // Hashed password
    ]);

    // Flash a success message to the session and redirect back
    return redirect()->back()->with('success', 'OJT supervisor successfully added.');
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
    public function update(Request $request)
    {
        // Find the admin by ID
        $admin = Admin::findOrFail($request->id);

        
        // Validate the incoming data
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admins,email,' . $request->id, // Exclude current email
        ]);
    
        // // Update admin fields
        $admin->firstname = $request->input('firstname');
        $admin->middlename = $request->input('middlename');
        $admin->lastname = $request->input('lastname');
        $admin->email = $request->input('email');
    
        // Save the updated admin
        $admin->save();
    
        // Redirect with success message
        return redirect()->route('admin.ojt_supervisor.index')->with('success', 'Admin updated successfully!');
    }
    
    
    

    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the supervisor by ID and delete
        Admin::findOrFail($id)->delete();
    
        // Flash a success message and redirect back
        return redirect()->back()->with('success', 'OJT supervisor successfully deleted.');
    }
    

    public function showLoginForm()
    {
        return view('auth.login'); // Assuming you have a view named admin.login
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required|min:8',
        ]);
    
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

    // public function approveStudent(Request $request, Student $student)
    // {
    //     // Update the student's application_status to "registered"
    //     $student->update(['application_status' => 'registered']);
        
    //     return redirect()->back()->with('success', 'Student approved successfully.');
    // }

    public function filterStudents(Request $request)
    {
        $status = $request->input('filter'); // Get the selected status from the request
    
        // Use the index method to handle filtering based on the status
        return $this->index($request, $status);
    }

    public function agencies(){

        $agencies = Agency::all();

        // dd($agencies);

        return view('admin.agencies.index', [
            'agencies' => $agencies,
        ]);
    }

    // public function categories(){
    //     return view('admin.categories.index');
    // }

    

    



}
