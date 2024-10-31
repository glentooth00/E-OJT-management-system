<?php

namespace App\Http\Controllers;

use App\Models\HealthCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HealthCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.healthCert.index');
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
        // Validate the uploaded file to allow images and PDF files
        $request->validate([
            'health_certificate' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:5120', // Allows images and PDFs up to 5MB
        ]);
    
        // Check if the file is uploaded
        if ($request->hasFile('health_certificate')) {
            // Get the file from the request
            $file = $request->file('health_certificate');
    
            // Generate a unique filename
            $filename = time() . '_' . $file->getClientOriginalName();
    
            // Store the file in 'storage/health_certificate' and get the file path
            $path = $file->storeAs('health_certificate', $filename, 'public');
    
            // Create a new HealthCertificate entry and save the file path
            $healthCertificate = new HealthCertificate();
            $healthCertificate->file_path = 'storage/' . $path; // Save the correct storage path
            $healthCertificate->save();
    
            // Redirect back with a success message
            return redirect()->back()->with('success', 'File uploaded successfully!');
        }
    
        return redirect()->back()->with('error', 'File upload failed');
    }
    
    public function download(){
        $healthCertificates = HealthCertificate::get();
        return view('student.download_&_upload.download',[
            'healthCertificates' => $healthCertificates,
        ]);
    }

    

    /**
     * Display the specified resource.
     */
    public function show(HealthCertificate $healthCertificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HealthCertificate $healthCertificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HealthCertificate $healthCertificate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HealthCertificate $healthCertificate)
    {
        //
    }
}
