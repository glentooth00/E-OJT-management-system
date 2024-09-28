<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\Moa;
use App\Models\Schoolyear;
use App\Models\Student;
use App\Models\weeklyReport;
use App\Models\YearLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display the student dashboard with the latest weekly reports.
     */
    public function index()
    {
        $student = Auth::guard('student')->user();
        $studentId = $student->id;

  

        // Retrieve the latest weekly report for each week using a subquery
        $latestReports = DB::table('weekly_reports')
            ->select('week_number', DB::raw('MAX(id) as max_id'))
            ->where('student_id', $studentId)
            ->groupBy('week_number')
            ->get();

        // Get the full weekly reports based on the maximum IDs found in the subquery
        $weeklyReports = weeklyReport::whereIn('id', $latestReports->pluck('max_id'))->get();

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

        $courses =  Course::all();

        $departments = Department::all();

        $yearLevels = YearLevel::all();

        return view('student.register',[
            'schoolYears' => $schoolYears,
            'courses' => $courses,
            'departments' => $departments,
            'yearLevels' => $yearLevels,
        ]);

        
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
            'school_year' => 'nullable|string|max:255'
        ]);
        // dd($validatedData);

        $validatedData['application_status'] = $validatedData['application_status'] ?? 'pending';
        $validatedData['role'] = 'student';

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

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

    public function approve($id)
    {
        // Find the student by ID
        $student = Student::findOrFail($id);
    
        // Update the student's status to 'registered'
        $student->application_status = 'registered';
    
        // Save the changes
        $student->save();
    
        // /Redirect or return a response
        return redirect()->back()->with('success', 'Student status updated to registered.');
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
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::guard('student')->attempt($credentials)) {
            return redirect()->route('student.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
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
    
            return view('student.weekly_report.index', compact('studentId', 'studentName'));
        }
    
        return redirect()->route('login')->withErrors(['message' => 'Please log in to access this page.']);
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
