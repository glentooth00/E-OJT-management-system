<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Department;
use App\Models\Endorsement;
use App\Models\YearLevel;
use Illuminate\Http\Request;

class EndorsementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        // Retrieve all endorsements from the database
        $endorsements = Endorsement::all();
    
        // Return the view and pass the endorsements to it
        return view('admin.endorsement_letter.list', compact('endorsements'));
    }
    
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          // Retrieve all agencies from the database
        $agencies = Agency::all();
    
        // Retrieve all departments from the database
        $departments = Department::all();
    
        // Retrieve all year levels from the database
        $yearLevels = YearLevel::all(); // Make sure to import the YearLevel model
    
        return view('admin.endorsement_letter.index', compact('agencies', 'departments', 'yearLevels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'agencyPersonnel' => 'required|string',
            'agencyName' => 'required|string',
            'agencyAddress' => 'required|string',
            'students_info' => 'required|string',  // Ensure this field is required
        ]);
    
        // Decode the students_info JSON to get the array of students
        $studentsInfo = json_decode($request->input('students_info'), true);
    
        // Create a new Endorsement record
        $endorsement = Endorsement::create([
            'agency_personnel' => $request->input('agencyPersonnel'),
            'agency_name' => $request->input('agencyName'),
            'agency_address' => $request->input('agencyAddress'),
            'endorsement_letter' => $request->input('endorsementLetter'), // Assuming the endorsement letter text is sent from the form
            'students_info' => json_encode($studentsInfo), // Store the student info as JSON
        ]);
    
        // Flash a success message to the session
        return redirect()->back()->with('success', 'Endorsement letter submitted successfully!');
    }
    
    
    
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $endorsement = Endorsement::findOrFail($id);
    
        $agencies = Agency::all();
        $departments = Department::all();
        $yearLevels = YearLevel::all();
    
        // Assuming you have a 'students_info' field in the 'endorsements' table that contains JSON data
        $studentsJson = $endorsement->students_info;  // Assuming it's a JSON string
    
        // Decode the JSON string into an array
        $students = json_decode($studentsJson, true);  // true converts it into an associative array
    
        return view('admin.endorsement_letter.view', [
            'endorsement' => $endorsement,
            'agencies' => $agencies,
            'departments' => $departments,
            'yearLevels' => $yearLevels,
            'students' => $students,
        ]);
        
    }
    
    
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Endorsement $endorsement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Endorsement $endorsement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
// EndorsementController.php

public function destroy($id)
{
    // Find the endorsement by its ID
    $endorsement = Endorsement::findOrFail($id);

    // Delete the endorsement
    $endorsement->delete();

    // Redirect back with a success message
    return redirect()->route('admin.endorsement.list')->with('success', 'Endorsement deleted successfully!');
}

}
