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
        $validatedData = $request->validate([
            'agencyPersonnel' => 'required|string',
            'agencyName' => 'required|string',
            'agencyAddress' => 'required|string',
            'students_info' => 'required|json', // Ensure the students_info is a valid JSON string
        ]);
    
        // Decode the students_info JSON into an array
        $studentsInfo = json_decode($request->input('students_info'), true);
    
        // Create the Endorsement model and save the data
        $endorsement = Endorsement::create([
            'agency_personnel' => $request->input('agencyPersonnel'),
            'agency_name' => $request->input('agencyName'),
            'agency_address' => $request->input('agencyAddress'),
            'students_info' => json_encode($studentsInfo), // Store the student info as JSON
            'status' => 'Pending', // Set status to 'Pending'
        ]);
    
        // Additional processing logic, if needed
        return redirect()->back()->with('success', 'Endorsement saved successfully!');
    }
    

    public function supEndorsement() {
        // Get the logged-in supervisor
        $supervisor = auth()->user(); // Get the currently authenticated user

        $office = $supervisor->office;

        $get_endorsements = Endorsement::where('agency_name', $office)->get();

    
        // Pass the supervisor data to the view
        return view('supervisor.endorsement.displayList', [
            'endorsements' => $get_endorsements,
        ]);
    }
    

    public function showEndorsement($id)
    {
        $endorsement = Endorsement::findOrFail($id);
    
        $agencies = Agency::all();
        $departments = Department::all();
        $yearLevels = YearLevel::all();
    
        // Assuming you have a 'students_info' field in the 'endorsements' table that contains JSON data
        $studentsJson = $endorsement->students_info;  // Assuming it's a JSON string
    
        // Decode the JSON string into an array
        $students = json_decode($endorsement->students_info, true);
        
        // You can pass the endorsement, agencies, and departments to the view
        return view('supervisor.endorsement.view', [
            'endorsement' => $endorsement,
            'agencies' => $agencies,
            'departments' => $departments,
            'yearLevels' => $yearLevels,
            'students' => $students,
        ]);
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
        $students = json_decode($endorsement->students_info, true);
    
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
