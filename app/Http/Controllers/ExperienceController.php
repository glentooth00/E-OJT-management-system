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
        // dd($studentDatas);

        $experiences = Experience::where('studentId' , $student->id)->get();

        $experiences->id;

        dd(  $experiences);

        // $experiences = Experience::get();

        // $experience = $experiences->id;

        // dd( $experiences);
    
        $dateNow = Carbon::now('Asia/Manila');
        $diffInWeek = $dateNow->diffInWeeks(Carbon::now('asia/manila')) + 1;
    
        return view('student.experience_record.index', [
            'diffInWeek' => $diffInWeek, 
            'studentDatas' => $studentDatas,
            'studentId' => $studentId,
            // 'isLoggedIn' => $isLoggedIn,
            // 'experiences' => $experiences,
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


        $experience = new Experience;

        $experience->status = 'Pending';
        $experience->time_in = Carbon::now('Asia/Manila')->format('g:i A');
        $experience->student = $request->student;
        $experience->studentId = $request->studentId;
        $experience->date =  Carbon::now('Asia/Manila');

        $experience->save();

        return redirect()->back()->with('success', 'Successfully logged IN!');
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
    public function update(Request $request, Experience $experience, $studentId)
    {
        $validate = $request->validate([
            'no_of_hours' => 'nullable|string|max:255',
            'week_no' => 'nullable|string|max:255',
            'activities' => 'nullable|string|max:255',
        ]);

        Experience::where('studentId', $studentId)->update($validate);



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
