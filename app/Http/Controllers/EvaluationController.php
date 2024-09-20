<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Questionnaire;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendances = Questionnaire::where('type','Attendance')->get();
        $punctualities = Questionnaire::where('type','Punctuality')->get();
        $initiatives = Questionnaire::where('type','Initiative')->get();
        $activities = Questionnaire::where('type','Ability to Plan Activities')->get();

        // dd($attendances);

        return view('admin.evaluation.index', [
            'attendances' => $attendances,  
            'punctualities' => $punctualities,
            'initiatives' => $initiatives,
            'activities' => $activities,
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
        $request->validate([
            'Attendance[]' => 'nullable|string|max:255',
            'activitypoints[]' => 'nullable|numeric|min:0|max:255',
        ]);

        // $request->validate([
        //     'Attendance1' => 'nullable|string|max:255',
        //     'Attendance2' => 'nullable|string|max:255',
        //     'Attendance3' => 'nullable|string|max:255',
        //     'activitypoints1' => 'nullable|numeric|min:0|max:255',
        //     'activitypoints2' => 'nullable|numeric|min:0|max:255',
        //     'activitypoints3' => 'nullable|numeric|min:0|max:255',
        // ]);

    dd($request->all());
        Evaluation::create($request->all());
    }



    /**
     * Display the specified resource.
     */
    public function show(Evaluation $evaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evaluation $evaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evaluation $evaluation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation)
    {
        //
    }
}
