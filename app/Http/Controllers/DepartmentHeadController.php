<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Course;
use App\Models\Department;
use App\Models\EndorsementLetter;
use App\Models\Moa;
use App\Models\Schoolyear;
use App\Models\Student;
use App\Models\Supervisor_student_evaluations;
use App\Models\weeklyReport;
use Illuminate\Support\Facades\Auth;
use App\Models\DepartmentHead;
use Illuminate\Http\Request;
use App\Mail\ApplicationApproved; // Don't forget to include this at the top
use Illuminate\Support\Facades\Mail; // Add this as well
use Illuminate\Support\Facades\Validator;




class DepartmentHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        /**
         * Display a listing of the resource.
         */
        public function index(Request $request, $status = null)
        {
            // Get the selected status from the request
            $status = $request->input('filter');
    
            // Get the logged-in user
            $user = Auth::user();
    
            // Get the course of the logged-in department head
            $course = $user->course;
    
            // Get the filtered students based on the selected status
            if ($status === 'pending' || $status === 'registered') {
                $filtered_students = Student::where('application_status', $status)
                    ->where('course', $course) // Filter students by the same course
                    ->get();
            } else {
                // If "All" option is selected, fetch all students with the same course
                $filtered_students = Student::where('course', $course)->get();
                $status = ''; // Set status to empty string for the "All" option
            }
    
            // Fetch additional data
            $agencies = Agency::all();
            $moas = Moa::all();
            $letters = EndorsementLetter::all();
    
            // Count registered and pending students in the same course
            $registered_students_no = Student::where('application_status', 'registered')->where('course', $course)->count();
            $pending_students_no = Student::where('application_status', 'pending')->where('course', $course)->count();
            $no_agencies = Agency::count(); // Optimized the count method for Agency
    
            // Return view with necessary data
            return view('department_head.dashboard', [
                'filtered_students' => $filtered_students,
                'selectedFilter' => $status, // Pass the selected status as selectedFilter
                'registered_students_no' => $registered_students_no,
                'pending_students_no' => $pending_students_no,
                'agencies' => $agencies,
                'moas' => $moas,
                'no_agencies' => $no_agencies,
                'letters' => $letters,
            ]);
        }

    public function gallery(){
        $test = 1;
        return view('department_head.gallery.index', [
            'test' => $test,
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
        $images = weeklyReport::where('student_id', $id)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('created_at', 'desc') // Order by created_at in descending order
            ->get();
    
        return view('department_head.weekly_reports.show', [
            'students' => $students,
            'images' => $images,
        ]);
    }

    public function view($student_id, $week_number, $day){
        
       $activity_logs = weeklyReport::where('student_id', $student_id)
        ->where('week_number', $week_number)
        ->where('day', $day)
        ->get();


        return view('department_head.weekly_reports.view', [
            'activity_logs' => $activity_logs,
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
    
        return view('department_head.gallery.index', [
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
    
    public function weekly_reports($id)
    {
        return view('department_head.weekly_reports.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $department_heads = DepartmentHead::all();
        $courses = Course::all(); // Fetch all courses
        $departments = Department::all();

        return view('department_head.departmentHead.index',[
            'department_heads' => $department_heads,
            'courses' => $courses,
            'departments' => $departments,
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
            'email' => 'nullable|email|unique:department_heads|max:255',
            'password' => 'nullable|string|min:8',
            'course' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
        ]);

        // dd( $validatedData);

        // // // Hash the password before saving
        $validatedData['password'] = bcrypt($validatedData['password']);

        // // Create a new department head record
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
    
            // Send approval email to the student
            Mail::to($student->email)->send(new ApplicationApproved($student));
    
            // Notify the user that the email has been sent
            return redirect()->back()->with('success', 'Student approved successfully and email notification sent.');
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


    public function viewEvaluation(){

    $evaluations = Supervisor_student_evaluations::paginate();

        

        return view('department_head.evaluation.index',[
            'evaluations' => $evaluations,
        ]);
    }
    
}
