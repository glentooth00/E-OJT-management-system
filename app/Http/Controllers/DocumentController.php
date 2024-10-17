<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Auth::guard('student')->user();
        if (!$student) {
            return redirect()->route('login')->withErrors(['message' => 'Please log in to access the dashboard.']);
        }
    
        // Fetch paginated students
        $students = Student::paginate(10);
    
        return view('student.documents.index', [
            'students' => $students,
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
        // Validate the incoming request data
        $validatedData = $request->validate([
            'student_id' => 'required|integer',
            'studentname' => 'required|string',
            'letter' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Image file with max size of 2MB
            'good_moral' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Image file with max size of 2MB
            'consent' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Image file with max size of 2MB
            'remarks' => 'required|string|max:255',
        ]);

        // dd($validatedData);
        // Process the uploaded image files and get their paths
        $letterPath = $request->file('letter')->store('student_documents', 'public');
        $goodMoralPath = $request->file('good_moral')->store('student_documents', 'public');
        $consentPath = $request->file('consent')->store('student_documents', 'public');

        // Create a new Document record in the database with image paths
        $document = new Document();
        $document->student_id = $validatedData['student_id'];
        $document->studentname = $validatedData['studentname'];
        $document->letter = $letterPath; // Store image path in 'letter' column
        $document->good_moral = $goodMoralPath; // Store image path in 'good_moral' column
        $document->consent = $consentPath; // Store image path in 'consent' column
        $document->remarks = $validatedData['remarks'];
        $document->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Images uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        $documents = Document::where('student_id', $id)->get(); // Add ->get() to retrieve the data
    
        // Debug the documents
        // dd($documents);
    
        return view('department_head.documents.show', [
            'student' => $student,
            'documents' => $documents,
        ]);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        //
    }

    public function documentIndex(){

        $user = Auth::user();

        $students = Student::where('course', $user->course)->get();

        return view('department_head.documents.index',[
            'students' => $students,
        ]);
    }
}
