<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\Moa;
use App\Models\Schoolyear;
use App\Models\Student;
use App\Models\weeklyReport;
use App\Models\YearLevel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Mail\ApplicationApproved; 
use Mail;// Don't forget to include this at the top

class StudentController extends Controller
{
    /**
     * Display the student dashboard with the latest weekly reports.
     */
    public function index()
    {
        $students = Auth::guard('student')->user();

        $studentId = $students->id;
    
        // Retrieve the latest weekly report for each week and day using a subquery
        $latestReports = DB::table('weekly_reports')
            ->select('week_number', 'day_no', DB::raw('MAX(id) as max_id'))
            ->where('student_id', $studentId)
            ->groupBy('week_number', 'day_no')  // Group by both week_number and day_no
            ->get();
    
        // Get the full weekly reports based on the maximum IDs found in the subquery
        $weeklyReports = weeklyReport::whereIn('id', $latestReports->pluck('max_id'))->orderBy('day_no', 'asc')->get();
    
        return view('student.dashboard', [
            'weeklyReports' => $weeklyReports,
            'studentId' => $studentId,
        ]);
    }
    

    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        $schoolYears = Schoolyear::all();
        $courses = Course::all(); // Eager load the department
        
        $departments = Department::all();
        $yearLevels = YearLevel::all();
    
        return view('student.register', [
            'schoolYears' => $schoolYears,
            'courses' => $courses,
            'departments' => $departments,
            'yearLevels' => $yearLevels,
        ]);
    }
    

    public function getYearLevels($courseInitials)
    {
        // Retrieve year levels where course column matches selected course initials
        $yearLevels = DB::table('year_levels')
            ->where('course', $courseInitials)
            ->select('year_level', 'section')
            ->get();
    
        // Return a JSON response with the year levels
        return response()->json($yearLevels);
    }
    
    
    

    
    
    

    /**
     * Store a newly created student in storage.
     */
    public function store(Request $request)
    {
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
            'application_status' => 'nullable|string',
            'school_year' => 'nullable|string|max:255',
            'year_level' => 'nullable|string|max:255'
        ]);
        // dd($validatedData);

        $validatedData['application_status'] = $validatedData['application_status'] ?? 'pending';
        $validatedData['role'] = 'student';

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }
        // dd( $validatedData);

        if ($request->hasFile('id_attachment')) {
            $file = $request->file('id_attachment');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('public/id_attachments', $fileName);
            $validatedData['id_attachment'] = str_replace('public/', '', $filePath);
        }

        Student::create($validatedData);

        return redirect()->route('site.index')->with('success', 'Student registered successfully.');
    }

    /**
     * Display the specified student.
     */
    public function show(string $id)
    {
        // Implementation here if needed
    }

    public function summary($student_id, $day_no, $day, $week_number)
    {
        // dd( $student_id, $day_no, $day);
        // Remove 'day_no' first and check if results are returned
        $activity_logs = weeklyReport::where('student_id', $student_id)
        ->where('day_no', $day_no)
        ->where('day', $day)
        ->where('week_number', $week_number)
        ->get();  // Check if this works
         
        $day = $day;
        $day_no = $day_no;

    //  dd( $activity_logs);

        return view('student.weekly_report.summary', [
            'activity_logs' =>  $activity_logs,
            'day' => $day,
            'day_no' => $day_no,
        ]);

    }

    /**
     * Show the form for editing the specified student.
     */
    public function edit(string $id)
    {
        // Implementation here if needed
    }

    /**
     * Update the specified student in storage.
     */
    public function update(Request $request, string $id)
    {
        // Implementation here if needed
    }

    public function updateStudentStatus(Request $request)
    {
        $id = $request->input('id');
        // Fetch the student using the ID
        $student = Student::findOrFail($id);
        // Validate the request
        $request->validate([
            'disignation' => 'nullable|string',
            'moa' => 'nullable|string',
            'endorsement' => 'nullable|string',
        ]);


        // Find the student by ID
        $student = Student::findOrFail($id);

        // dd($student);

        // // Update the status
        $student->moa = $request->input('moa');
        $student->designation = $request->input('designation');
        $student->endorsement = $request->input('endorsement');
        $student->save();

        // Redirect or return a response
        return redirect()->back()->with('success', 'Student status updated successfully');
    }

    // public function approve($id)
    // {
    //     // Find the student by ID
    //     $student = Student::findOrFail($id);
    
    //     // Update the student's status to 'registered'
    //     $student->application_status = 'registered';
    //     $student->date_registered = Carbon::now('Asia/Manila');
    
    //     // Save the changes
    //     $student->save();
    
    //     // /Redirect or return a response
    //     return redirect()->back()->with('success', 'Student status updated to registered.');
    // }

    public function approve($id)
{
    // Check if the authenticated user is a department head
    if (Auth::guard('admin')->check()) {
        // Find the student by ID
        $student = Student::findOrFail($id);
        
        // Update the student's status and date registered
        $student->application_status = 'registered';
        $student->date_registered = Carbon::now('Asia/Manila');
        
        // Save the changes
        $student->save();

        // Send approval email to the student
        Mail::to($student->email)->send(new ApplicationApproved($student));

        // Redirect with success message
        return redirect()->back()->with('success', 'Student status updated to registered and email notification sent.');
    } else {
        // Handle cases where the user is not authorized
        return redirect()->back()->withErrors(['error' => 'You are not authorized to perform this action.']);
    }
}

    


    /**
     * Remove the specified student from storage.
     */
    public function destroy(string $id)
    {
        // Implementation here if needed
    }

    /**
     * Show the student login form.
     */
    public function showLoginForm()
    {
        return view('auth.student_login');
    }

    /**
     * Handle student login.
     */
    public function login(Request $request)
    {
        // Validate the request data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
    
        // Attempt to log the user in
        if (Auth::guard('student')->attempt($credentials)) {
            // Redirect to the student dashboard on successful login
            return redirect()->route('student.dashboard');
        }
    
        // If login fails, check the conditions and return appropriate errors
        $student = Student::where('email', $credentials['email'])->first();
    
        if (!$student) {
            // If the student does not exist
            return back()->withErrors(['email' => 'No account found with this email address.']);
        } elseif (!$student->is_active) {
            // If the account is inactive
            return back()->withErrors(['email' => 'Your account is inactive. Please contact support.']);
        } else {
            // If the password is incorrect
            return back()->withErrors(['password' => 'The provided password is incorrect.']);
        }
    }
    

    /**
     * Show the weekly report index for the authenticated student.
     */
    public function weeklyReportIndex()
    {
        $student = Auth::guard('student')->user();

        if ($student) {
            $studentId = $student->id;
            $studentName = $student->fullname; // Adjust based on your actual column name for the student's name
            $registeredDate = Carbon::parse($student->date_registered);

            $weeksPassed = $registeredDate->diffInWeeks(Carbon::now('Asia/Manila'));

            $weeksPassed = ($weeksPassed == 0) ? 1 : $weeksPassed;
          
            return view('student.weekly_report.index',[
                'studentId' => $studentId,
                'studentName' => $studentName,
                'weeksPassed' => $weeksPassed,
            ]);
        }
    
        // return redirect()->route('login')->withErrors(['message' => 'Please log in to access this page.']);
    }
    

    /**
     * Handle image uploads for weekly reports.
     */
    public function uploadImgs(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'student_id' => 'required|integer',
            'weekNumber' => 'required|integer',
            'activityPhoto.*' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
            'activityDescription' => 'required|string',
        ]);

        dd($validatedData);
    
        // // Ensure the directory exists
        // $storagePath = storage_path('app/public/weekly_reports');
        // if (!file_exists($storagePath)) {
        //     mkdir($storagePath, 0755, true);
        // }
    
        // // Process each uploaded file
        // if ($request->hasFile('activityPhoto')) {
        //     foreach ($request->file('activityPhoto') as $file) {
        //         // Generate a unique file name to avoid conflicts
        //         $fileName = time() . '_' . $file->getClientOriginalName();
        //         $filePath = $file->storeAs('public/weekly_reports', $fileName);
    
        //         // Debugging info: Log the file path
        //         \Log::info('Uploaded file path: ' . $filePath);
    
        //         // Save the file path to the database or handle further processing
        //         // Assuming you have a model for WeeklyReportFile to save file info
        //         WeeklyReportFile::create([
        //             'student_id' => $validatedData['student_id'],
        //             'week_number' => $validatedData['weekNumber'],
        //             'file_path' => str_replace('public/', 'storage/', $filePath), // Adjust path for public access
        //         ]);
        //     }
        // }
    
        // // Save other weekly report details to the database
        // WeeklyReport::create([
        //     'student_id' => $validatedData['student_id'],
        //     'week_number' => $validatedData['weekNumber'],
        //     'description' => $validatedData['activityDescription'],
        //     // Add other necessary fields
        // ]);
    
        return redirect()->back()->with('success', 'Files uploaded successfully.');
    }
    
    

    /**
     * Handle student logout.
     */
    public function logout(Request $request)
    {
        Auth::guard('student')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('site.index');
    }
}
