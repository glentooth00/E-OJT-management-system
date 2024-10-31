<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questionItems = Questionnaire::simplePaginate(10); // Adjust 10 as per your desired items per page
    
        return view('admin.questionnaire.index', [
            'questionItems' => $questionItems,
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $questionItems = Questionnaire::all();
        //  dd($questionItems);
        // return view('admin.questionnaire.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'question' => 'nullable|string|max:255',
            'points' => 'nullable|numeric|min:0|max:255',
            'type' => 'nullable|string|max:255',
        ]);

        Questionnaire::create($request->only('question','points', 'type'));

        return redirect()->back()->with('success', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Questionnaire $questionnaire)
    {
        //  
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Questionnaire $questionnaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    // Controller Method to update statu

public function updateStatus(Request $request, $id)
{
    // Retrieve the item by ID and update its status
    $questionItem = Questionnaire::findOrFail($id);
    $questionItem->status = $request->input('status') ? 1 : 0;
    $questionItem->save();

    return back()->with('status', 'Status updated successfully');
}

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Questionnaire $questionnaire)
    {
        //
    }
}
