<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Schoolyear;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use App\Models\DepartmentHead;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;




class DepartmentHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $status = null)
    {
    // Get the selected status from the request
    $status = $request->input('filter');

    // Get the filtered students based on the selected status
    if ($status === 'pending' || $status === 'registered') {
        $filtered_students = Student::where('application_status', $status)->get();
    } else {
        $filtered_students = Student::all();
        $status = ''; // Set status to empty string for the "All" option
    }

    $agencies =  Agency::all();

    // Other data you may need to pass to the view
    $registered_students_no = Student::where('application_status', 'registered')->count();
    $pending_students_no = Student::where('application_status', 'pending')->count();

    return view('department_head.dashboard', [
        'filtered_students' => $filtered_students,
        'selectedFilter' => $status, // Pass the selected status as selectedFilter
        'registered_students_no' => $registered_students_no,
        'pending_students_no' => $pending_students_no,
        'agencies' => $agencies,
    ]);
    }

    public function departmentIndex(){
        $department_heads = DepartmentHead::all();

        return view('admin.departmentHead.index', [
            'department_heads' => $department_heads,
        ]);
    }

    public function indexDepartmentHead()
    {
        // Get all school years in descending order
        $school_years = Schoolyear::orderBy('school_year', 'desc')->get();
    
        // Get all students
        $students = Student::all();
    
        return view('department_head.archives.index', [
            'school_years' => $school_years,
            'students' => $students,
        ]);
    }
    

    public function filterStudentsDept(Request $request)
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

        return view('department_head.archives.index', [
            'school_years' => $school_years,
            'students' => $students,
        ]);
    }
    
    public function weekly_reports()
    {
        return view('department_head.weekly_reports.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $department_heads = DepartmentHead::all();

        return view('department_head.departmentHead.index',[
            'department_heads' => $department_heads,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'nullable|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:department_heads|max:255',
            'password' => 'required|string|min:8',
            'department' => 'required|string|max:255',
        ]);

        // dd($validatedData);

        // // Hash the password before saving
        $validatedData['password'] = bcrypt($validatedData['password']);

        // Create a new department head record
        $departmentHead = DepartmentHead::create($validatedData);

        // Redirect or return response as needed
        return redirect()->route('department_head.departmentHead.create')->with('success', 'Department Head created successfully.');
    }          

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Fetch the department head details by ID
        $departmentHead = DepartmentHead::findOrFail($id);

        // Return the view with the department head details
        return view('show', compact('departmentHead'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DepartmentHead $departmentHead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DepartmentHead $departmentHead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DepartmentHead $departmentHead)
    {
        //
    }

    public function approveStudent(Request $request, Student $student)
    {
        // Check if the authenticated user is a department head
        if (Auth::guard('department_head')->check()) {
            // Update the student's application_status to "registered"
            $student->update(['application_status' => 'registered']);
            
            return redirect()->back()->with('success', 'Student approved successfully.');
        } else {
            // Handle cases where the user is not authorized
            return redirect()->back()->withErrors(['error' => 'You are not authorized to perform this action.']);
        }
    }
    

    public function showLoginForm()
    {
        return view('auth.department_login'); // Assuming you have a view named admin.login
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('department_head')->attempt($credentials)) {
            // Authentication successful, redirect to intended page
            return redirect()->route('department_head.dashboard');
        } else {
            // Authentication failed, log error message
            \Log::error('Authentication failed for department head with email: ' . $credentials['email']);
    
            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }
    }
    

    // public function approveStudent(Request $request, Student $student)
    // {
    //     \Log::info('Approving student: ' . $student->id);
        
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
    

    public function logout(Request $request)
    {
        Auth::guard('department_head')->logout(); // Logout the department head user
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token
        
        return redirect()->route('site.index'); // Redirect to the site's index page
    }
    
}
