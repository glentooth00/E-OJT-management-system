<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Student;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Auth::guard('student')->user();
    
        // Check if the student is authenticated
        if (!$student) {
            return redirect()->route('login')->with('error', 'Please log in to access this page.');
        }
    
        $studentDatas = $student->fullname;
        $studentId = $student->id;
        $registeredDate = Carbon::parse($student->date_registered);
        $studentDesignation = $student->designation;
    
        // Get the latest approved experience
        $experience = Experience::where('studentId', $student->id)
            ->where('status', 'Approved')
            ->first();
    
        // Get all experiences for the student with status Approved or Logged Out, ordered by latest
        $dailyExperiences = Experience::where('studentId', $student->id)
            ->whereIn('status', ['Approved', 'Logged-Out'])
            ->latest()
            ->get();

    // Get the attendance record
        $in = Experience::where('studentId', $student->id)
        ->where('attendance', 'in')
        ->first(); // Retrieve a single record with 'attendance' as 'in'

    // If a record is found, set $isLoggedIn to true, otherwise false
    $isLoggedIn = $in ? true : false;
    
        $dateNow = Carbon::now('Asia/Manila');
        $diffInWeek =  $registeredDate->diffInWeeks(Carbon::now('Asia/Manila')) + 1;
    
        return view('student.experience_record.index', [
            'diffInWeek' => $diffInWeek,
            'studentDatas' => $studentDatas, // student name
            'studentId' => $studentId, // student id
            'experience' => $experience,
            'dailyExperiences' => $dailyExperiences,
            'isLoggedIn' => $isLoggedIn,
            'studentDesignation' => $studentDesignation,
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
        // $validate = $request->validate([
        //     'no_of_hours' => 'nullable|string|max:255',
        //     'week_no' => 'nullable|string|max:255',
        //     'activities' => 'nullable|string|max:255',
        // ]);

        // Experience::create( $validate);
    }

    public function timeIn( Request $request ){

        $dateNow = Carbon::now('Asia/Manila');
        $diffInWeek = $dateNow->diffInWeeks(Carbon::now('Asia/Manila')) + 1;

        $experience = new Experience;

        $experience->status = 'Pending';
        $experience->attendance = 'in';
        $experience->week_no = $diffInWeek;
        $experience->time_in = Carbon::now('Asia/Manila')->format('g:i A');
        $experience->student = $request->student;
        $experience->studentId = $request->studentId;
        $experience->designation = $request->designation;
        $experience->date =  Carbon::now('Asia/Manila');

        $experience->save();

        return redirect()->back()->with('success', 'Successfully logged IN!');
    }

    public function timeOut(Request $request)
    {
        // Find the most recent 'timeIn' record for the student without a 'timeOut' entry
        $experience = Experience::where('studentId', $request->studentId)
            ->where('attendance', 'in')
            ->whereNull('time_out')
            ->latest('date')
            ->first();
    
        if ($experience) {
            // Calculate the difference in hours between time_in and the current time_out
            $timeIn = Carbon::parse($experience->time_in);
            $timeOut = Carbon::now('Asia/Manila');
    
            $noOfHours = $timeIn->diffInHours($timeOut); // Calculate hours between time_in and time_out
            $experience->time_out = $timeOut->format('g:i A');
            $experience->attendance = 'out';
            $experience->status = 'Logged-Out';
            $experience->no_of_hours = $noOfHours;
    
            // Save the current experience entry with updated time_out and no_of_hours
            $experience->save();
    
            // Update total_no_hours by summing all no_of_hours for this student
            $totalNoHours = Experience::where('studentId', $request->studentId)
                ->whereNotNull('time_out')
                ->sum('no_of_hours');
    
            // Save the cumulative total if you want it in each entry
            $experience->total_no_hours = $totalNoHours;
            $experience->save();
    
            // Check if the student has reached or exceeded 480 hours
            if ($totalNoHours >= 480) {
                return redirect()->back()->with('success', 'Congratulations! You have completed your OJT requirement of 480 hours.');
            }
        } else {
            return response()->json(['message' => 'Record not found'], 404);
        }
    
        return redirect()->back()->with('success', 'Successfully logged OUT!');
    }
    
    
    

    /**
     * Display the specified resource.
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
 
        $validate = $request->validate([
            'week_no' => 'nullable|string|max:255',
            'activities' => 'nullable|string|max:255',
        ]);
        

        $i = Experience::where('id', $id)->where('status', 'Approved')->update($validate);

        return redirect()->back()->with('success', 'activity saved');
    }

    public function approveExperience($studentId, $experienceId) {
        // Debugging: Check the incoming parameters

    
        $user = Auth::guard('supervisor')->user();
        $user_designation = $user->office;
    
        // Fetching the experience record
        $getStudents = Experience::where('id', $experienceId)
            ->where('designation', $user_designation)
            ->where('status', STATUS_PENDING) // Optional, if you want to ensure the record belongs to the user's office
            ->first(); // Get a single instance
    

    
        if ($getStudents) {
            // Update the status directly
            $getStudents->status = 'Approved';
            $getStudents->save();
    
            // Redirect back with a success message
            return redirect()->back()->with('success', 'Status updated successfully.');
        }
        
        // If no record found
        return redirect()->back()->with('error', 'No matching record found.');
    }

    public function viewExperience($studentId, $experienceId){

        $dailyExperiences = Experience::where('id' ,  $experienceId)->where('studentId', $studentId)->get();

        return view('supervisor.experience.view',[
            'dailyExperiences' => $dailyExperiences,
        ]);

    }
    
    
    


    public function supIndexView()
    {
        $supervisor = Auth::guard('supervisor')->user();
        $office = $supervisor->office;
    
        // Fetch all students
        $students = Student::where('designation', $office)->get();
    
        // Pass the students data to the view
        return view('supervisor.experience.index', [
            'students' => $students,
        ]);
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience)
    {
        //
    }
}
