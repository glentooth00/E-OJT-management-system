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
        $diffInWeek = $dateNow->diffInWeeks(Carbon::now('Asia/Manila')) + 1;
    
        return view('student.experience_record.index', [
            'diffInWeek' => $diffInWeek,
            'studentDatas' => $studentDatas, // student name
            'studentId' => $studentId, // student id
            'experience' => $experience,
            'dailyExperiences' => $dailyExperiences,
            'isLoggedIn' => $isLoggedIn,
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

        $data = $request->validate([
            'student' => 'nullable|string|max:255',
            'studentId' => 'nullable|string|max:255',
            'week_no' => 'nullable|string|max:255',
        ]);

        $dateNow = Carbon::now('Asia/Manila');
        $diffInWeek = $dateNow->diffInWeeks(Carbon::now('Asia/Manila')) + 1;

        $experience = new Experience;

        $experience->status = 'Pending';
        $experience->week_no = $diffInWeek;
        $experience->time_in = Carbon::now('Asia/Manila')->format('g:i A');
        $experience->student = $request->student;
        $experience->studentId = $request->studentId;
        $experience->date =  Carbon::now('Asia/Manila');

        $experience->save();

        return redirect()->back()->with('success', 'Successfully logged IN!');
    }

    public function timeOut(Request $request){

        dd($request->studentId);

        

        $experience = new Experience;
        $experience->attendance = 'out';
        $experience->status = 'Logged-Out';
        $experience->save();
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
            'no_of_hours' => 'nullable|string|max:255',
            'week_no' => 'nullable|string|max:255',
            'activities' => 'nullable|string|max:255',
        ]);
        // dd($id);

        $i = Experience::where('id', $id)->where('status', 'Approved')->update($validate);

        return redirect()->back()->with('success', 'activity saved');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience)
    {
        //
    }
}
