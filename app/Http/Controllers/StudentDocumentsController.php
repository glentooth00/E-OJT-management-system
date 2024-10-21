<?php

namespace App\Http\Controllers;

use App\Models\student_documents;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Storage;


class StudentDocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = student_documents::get();

        return view('student.download_&_upload.download', [
            'documents' => $documents,
        ]);
    }

    public function downloadPdf($id, $type)
    {
        // Fetch the document based on the ID
        $document = student_documents::find($id);

        if (!$document) {
            return response()->json(['error' => 'Document not found.'], 404);
        }

        // Determine the file path based on the document type
        $filePath = '';

        switch ($type) {
            case 'good_moral':
                $filePath = $document->good_moral;
                break;
            case 'endorsement_letter':
                $filePath = $document->endorsement_letter;
                break;
            case 'letter_of_consent':
                $filePath = $document->letter_of_consent;
                break;
            default:
                return response()->json(['error' => 'Invalid document type.'], 400);
        }

        // Check if the file exists
        if (!Storage::exists($filePath)) {
            return response()->json(['error' => 'File not found.'], 404);
        }

        // Return the file as a response
        return response()->download(storage_path("app/{$filePath}"));
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
        //
    }

    public function uploadMultiple(Request $request)
{
    // Validate the uploaded files
    $request->validate([
        'good_moral' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'endorsement_letter' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'letter_of_consent' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Initialize an array to store file paths
    $data = [];

    // Store Good Moral document if present
    if ($request->hasFile('good_moral')) {
        $goodMoralFileName = time() . '_good_moral_' . $request->file('good_moral')->getClientOriginalName();
        $request->file('good_moral')->storeAs('documents', $goodMoralFileName, 'public');
        $data['good_moral_path'] = 'storage/documents/' . $goodMoralFileName;
    }

    // Store Endorsement Letter document if present
    if ($request->hasFile('endorsement_letter')) {
        $endorsementLetterFileName = time() . '_endorsement_letter_' . $request->file('endorsement_letter')->getClientOriginalName();
        $request->file('endorsement_letter')->storeAs('documents', $endorsementLetterFileName, 'public');
        $data['endorsement_letter_path'] = 'storage/documents/' . $endorsementLetterFileName;
    }

    // Store Letter of Consent document if present
    if ($request->hasFile('letter_of_consent')) {
        $letterOfConsentFileName = time() . '_letter_of_consent_' . $request->file('letter_of_consent')->getClientOriginalName();
        $request->file('letter_of_consent')->storeAs('documents', $letterOfConsentFileName, 'public');
        $data['letter_of_consent_path'] = 'storage/documents/' . $letterOfConsentFileName;
    }

    // Save file paths to the database
    \App\Models\Document::create([
        'user_id' => auth()->user()->id,  // Assuming the user is logged in
        'good_moral_path' => $data['good_moral_path'] ?? null,
        'endorsement_letter_path' => $data['endorsement_letter_path'] ?? null,
        'letter_of_consent_path' => $data['letter_of_consent_path'] ?? null,
    ]);

    return back()->with('success', 'Documents uploaded and saved successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(student_documents $student_documents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(student_documents $student_documents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, student_documents $student_documents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student_documents $student_documents)
    {
        //
    }
}
