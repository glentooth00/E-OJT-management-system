<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\weeklyReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB; // Import DB from the correct namespace
// Assuming this is your WeeklyReport model

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     // Get the authenticated student
    //     $student = Auth::guard('student')->user();
    //     $studentId = $student->id; // Access the student's ID
    
    //     // Pass the student ID to the view
    //     return view('student.dashboard', compact('studentId'));
    // }

    

    public function index()
    {
        // Get the authenticated student
        $student = Auth::guard('student')->user();
        $studentId = $student->id; // Access the student's ID

        // Retrieve the latest weekly report for each week using a subquery
        $latestReports = DB::table('weekly_reports')
            ->select('week_number', DB::raw('MAX(id) as max_id'))
            ->where('student_id', $studentId)
            ->groupBy('week_number')
            ->get();

        // Get the full weekly reports based on the maximum IDs found in the subquery
        $weeklyReports = WeeklyReport::whereIn('id', $latestReports->pluck('max_id'))
            ->get();

        // Pass the retrieved data to the view
        return view('student.dashboard', compact('weeklyReports'));
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
        // Validate the incoming request data
        $validatedData = $request->validate([
            'fullname' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:students|max:255',
            'password' => 'nullable|string|min:8',
            'course' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'id_number' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'contact_number' => 'nullable|string|max:20',
            'dob' => 'nullable|date',
            'sex' => 'nullable|string|in:MALE,FEMALE',
            'id_attachment' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
            'application_status' => 'nullable|string' // Define validation rule for application_status
        ]);
        
        // Set default value for application_status if not provided in the request
        $validatedData['application_status'] = 'pending';
        $validatedData['role'] = 'student';
        
        // Hash the password if it's provided
        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }
    
        // Handle ID attachment upload if provided
        if ($request->hasFile('id_attachment')) {
            $file = $request->file('id_attachment');
            $fileName = $file->getClientOriginalName(); // Get the original file name
            $filePath = $file->storeAs('public/id_attachments', $fileName); // Store the file in the specified storage folder
            // Remove 'public/' from the beginning of the file path
            $validatedData['id_attachment'] = str_replace('public/', '', $filePath); 
        }
    
        // Create a new student record
        $student = Student::create($validatedData);
    
        // Redirect or return a response
        return redirect()->route('site.index')->with('success', 'Student registered successfully.');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showLoginForm()
    {
        return view('auth.student_login'); // Assuming you have a view named auth.student_login for student login
    }


// Inside your StudentController class
public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:8',
    ]);

    if (Auth::guard('student')->attempt($credentials)) {
        // Redirect to the student dashboard upon successful login
        return redirect()->route('student.dashboard');
    }

    return back()->withErrors(['email' => 'Invalid credentials']);
}


public function weeklyReportIndex()
{
    $studentId = Auth::id(); // Assuming you're using the Auth facade to get the logged-in student ID

    return view('student.weekly-report.index', compact('studentId'));
}


//     public function uploadImgs(Request $request)
// {
//     // dd($request);
//     $validatedData = $request->validate([
//         // Your other validation rules here
//         'activityPhoto.*' => 'nullable|file|mimes:jpeg,png,pdf|max:2048', // Adjust as needed
//     ]);

//     // Process each uploaded file
//     if ($request->hasFile('activityPhoto')) {
//         foreach ($request->file('activityPhoto') as $file) {
//             // Handle each file (e.g., store in storage, save file path to database, etc.)
//             $fileName = $file->getClientOriginalName();
//             $filePath = $file->storeAs('public/id_attachments', $fileName);
//             // Your processing logic here
//         }
//     }

//     // Other processing logic

//     return redirect()->back()->with('success', 'Files uploaded successfully.');
// }
    

public function logout(Request $request)
{
    Auth::guard('student')->logout(); // Logout the student user
    $request->session()->invalidate(); // Invalidate the session
    $request->session()->regenerateToken(); // Regenerate the CSRF token

    return redirect()->route('site.index'); // Redirect to the site's index page
}
}
