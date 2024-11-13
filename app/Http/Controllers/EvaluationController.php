<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\EvaluationScore;
use App\Models\Questionnaire;
use App\Models\Student;
use App\Models\Supervisor_student_evaluations;
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

        return view('supervisor.evaluation.index', [
            'attendances' => $attendances,  
            'punctualities' => $punctualities,
            'initiatives' => $initiatives,
            'activities' => $activities,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */

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
    
    public function evaluateStudent(Request $request)
    {
        
        $studentId = $request->input('studentId');
        $studentName = $request->input('studentName');
        $remarks = $request->input('remarks');
    
        // Prepare common data
        $commonData = [
            'student_name' => $studentName,
            'student_id' => $studentId,
        ];
    
        // Initialize an array to hold all evaluated data
        $evaluatedData = [
            'attendance_questions' => '',
            'attendance_points' => '',
            'punctuality_questions' => '',
            'punctuality_points' => '',
            'initiative_questions' => '',
            'initiative_points' => '',
            'planning_questions' => '',
            'planning_points' => '',
            'cooperation_questions' => '',
            'cooperation_points' => '',
            'interest_questions' => '',
            'interest_points' => '',
            'field_questions' => '',
            'field_points' => '',
            'appearance_questions' => '',
            'appearance_points' => '',
            'alert_questions' => '',
            'alert_points' => '',
            'self_questions' => '',      // Add self-confidence questions
            'self_points' => '',         // Add self-confidence points
            'total_score' => 0,           // Initialize total_score
            'remarks' => $request->input('remarks'), // Get remarks from the request
        ];
    
        // Initialize total points variable
        $totalScore = 0;
    
        // Process sections
        $sections = [
            'attendance' => 'attendance_questions',
            'punctuality' => 'punctuality_questions',
            'initiative' => 'initiative_questions',
            'planning' => 'planning_questions',
            'cooperation' => 'cooperation_questions',
            'interest' => 'interest_questions',
            'field' => 'field_questions',
            'appearance' => 'appearance_questions',
            'alert' => 'alert_questions',
            'self' => 'self_questions',
        ];
    
        foreach ($sections as $sectionKey => $sectionQuestionField) {
            $questions = $request->input("{$sectionKey}_questions");
            $points = $request->input("{$sectionKey}_points");
    
            // Process section questions and points
            if ($questions) {
                foreach ($questions as $question => $selectedQuestion) {
                    $pointValue = $points[$question] ?? 0; // Ensure default value
                    $evaluatedData["{$sectionKey}_questions"] .= $selectedQuestion . ';';
                    $evaluatedData["{$sectionKey}_points"] .= $pointValue . ';';
                    $totalScore += (float) $pointValue; // Add to total score
                }
            }
        }
    
        // Remove trailing semicolons from all fields
        foreach ($evaluatedData as $key => $value) {
            if (is_string($value)) {
                $evaluatedData[$key] = rtrim($value, ';');
            }
        }
    
        // Set the total score
 // Check if total score is exactly 9.0
if ($totalScore == 9.0) {
    $totalScore = 10.0; // Set to 10 if total score is 9.0
}

// If totalScore is less than 9, it remains unchanged

// Save the score (example)
$evaluatedData['total_score'] = $totalScore;


    
        // Save the evaluated data in the database
        Supervisor_student_evaluations::create(array_merge($commonData, $evaluatedData));
    
        // // Redirect back to the index with a success message
        return redirect()->route('supervisor.evaluate.index')->with('success', 'Evaluation submitted successfully!');
    }
    
    
    
    
    
    

    // public function evaluate($id){

    //         // Fetch the student or intern using the ID
    //     $interns = Student::findOrFail($id);
    //     $attendances = Questionnaire::where('type', 'Attendance')
    //                                 ->where('status', 1)
    //                                 ->get();

    //     $punctualities = Questionnaire::where('type', 'Punctuality')
    //                                 ->where('status', 1)
    //                                 ->get();

        
    //     return view('supervisor.interns.evaluation_form', [
    //         'interns' => $interns,
    //         'attendances' => $attendances,
    //         'punctualities' => $punctualities,
    //     ]);
    // }

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
