<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\EvaluationScore;
use App\Models\Questionnaire;
use App\Models\Student;
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
        // Create a new evaluation
        $evaluation = Evaluation::create([
            'student_id' => $request->student_id,
            'date' => now(),
            'comments' => $request->comments
        ]);
    
        // Loop through the criteria and store individual scores
        foreach ($request->criteria as $criterion_id => $score) {
            EvaluationScore::create([
                'evaluation_id' => $evaluation->id,
                'criterion_id' => $criterion_id,
                'score' => $score
            ]);
        }
    
        // Calculate total score
        $totalPoints = EvaluationScore::where('evaluation_id', $evaluation->id)
            ->sum('score');
    
        // Update the total points in the evaluation
        $evaluation->update(['total_points' => $totalPoints]);
    
        return redirect()->back()->with('success', 'Evaluation successfully recorded.');
    }
    

    public function evaluate($id){

            // Fetch the student or intern using the ID
        $interns = Student::findOrFail($id);
        $attendances = Questionnaire::where('type', 'Attendance')
                                    ->where('status', 1)
                                    ->get();

        $punctualities = Questionnaire::where('type', 'Punctuality')
                                    ->where('status', 1)
                                    ->get();

        
        return view('supervisor.interns.evaluation_form', [
            'interns' => $interns,
            'attendances' => $attendances,
            'punctualities' => $punctualities,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Evaluation $evaluation)
    {
    //    /
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
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'question' => 'nullable|string|max:255',
            'type' => 'nullable|string',
            'points' => 'nullable|numeric|min:0',
        ]);
    
        // Find the item by ID
        $item = Questionnaire::findOrFail($id);
    
        // Update the fields
        $item->question = $request->input('question'); // Assuming this is the field name
        $item->type = $request->input('type');
        $item->points = $request->input('points');
    
        // Save the changes
        $item->save();
    
        // Redirect or return a response
        return redirect()->back()->with('success', 'Evaluation updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation)
    {
        //
    }
}
