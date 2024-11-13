<?php 

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use App\Models\Student;
use App\Models\Category;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SupervisorController extends Controller
{
    public function index()
    {
        $categories = Category::all(); // Fetch all categories
        $supervisor_accounts = Supervisor::orderBy('created_at', 'desc')->get(); // Fetch all supervisor accounts sorted by latest

        return view('admin.supervisor.index', [
            'categories' => $categories,
            'supervisor_accounts' => $supervisor_accounts
        ]);
    }

    public function internList(Request $request) {
    
        $searchTerm = $request->input('search');
        $course = $request->input('course');
    
        $students = Student::when($searchTerm, function ($query, $searchTerm) {
            return $query->where('fullname', 'LIKE', '%' . $searchTerm . '%');
        })->when($course, function ($query, $course) {
            return $query->where('course', $course);
        })
        // Add condition to filter by MDRRMO designation
        ->where('designation', 'MDRRMO')
        ->paginate(10);
    
        return view('supervisor.list.index', [
            'students' => $students,
            'searchTerm' => $searchTerm,
            'course' => $course,
        ]);
    }
    

    public function internsLIst()
    {
        $loggedInUser = Auth::user();

        // dd($loggedInUser->office);
        // /Fetch interns from the database, for example:
        $interns = Student::where('designation',  $loggedInUser->office )->get();

        // Return the view with interns data
        return view('supervisor.interns.index',[
            'interns' => $interns,
        ]);
    }

    public function Supervisor_index()
    {
        $categories = Category::all(); // Fetch all categories
        $supervisor_accounts = Supervisor::orderBy('created_at', 'desc')->get(); // Fetch all supervisor accounts sorted by latest

        return view('supervisor.dashboard', [
            'categories' => $categories,
            'supervisor_accounts' => $supervisor_accounts
        ]);
    }



    public function create()
    {
       //
    }

    public function evaluate($id)
    {
        $student = Student::where('id', $id)->first();

        $attendances = Questionnaire::where('type' , 'Attendance')->where('status', '1')->get();

        $punctualities = Questionnaire::where('type' , 'Punctuality')->where('status', '1')->get();

        $initiatives = Questionnaire::where('type' , 'Initiative')->where('status', '1')->get();

        $plannings = Questionnaire::where('type' , 'Ability to Plan Activities')->where('status', '1')->get();

        $cooperations = Questionnaire::where('type' , 'Cooperation')->where('status', '1')->get();

        $interests = Questionnaire::where('type' , 'Interest and attitudes towards work')->where('status', '1')->get();

        $fields = Questionnaire::where('type' , 'Major Field of Concentration')->where('status', '1')->get();

        $appearances = Questionnaire::where('type' , 'Appearance')->where('status', '1')->get();

        $alertness = Questionnaire::where('type' , 'Alertness')->where('status', '1')->get();

        $self_confidence = Questionnaire::where('type' , 'Self-Confidence')->where('status', '1')->get();

          return view('supervisor.evaluate.evaluation_form',[
            'student' => $student,
            'attendances' => $attendances,
            'punctualities' => $punctualities,
            'initiatives' => $initiatives,
            'plannings' => $plannings,
            'cooperations' => $cooperations,
            'interests' => $interests,
            'fields' => $fields,
            'appearances' => $appearances,
            'alertness' => $alertness,
            'self_confidence' => $self_confidence,
        ]);
    }

    public function store(Request $request)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'first_name' => 'nullable|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'username' => 'nullable|max:255|unique:supervisors,username', // Ensure uniqueness
            'password' => 'required|string|min:8',
            'category' => 'required|string|max:255',
            'office' => 'required|string|max:255',
        ]);
    
        // Create supervisor record
        Supervisor::create([
            'first_name' => $validatedData['first_name'],
            'middle_name' => $validatedData['middle_name'],
            'last_name' => $validatedData['last_name'],
            'username' => $validatedData['username'], // Ensure the username is passed here
            'password' => Hash::make($validatedData['password']),
            'category' => $validatedData['category'],
            'office' => $validatedData['office'],
        ]);
    
        return redirect()->back()->with('success', 'Supervisor account created successfully.');
    }
    
    

    public function studentActivities($student_id, $day, $day_no){
        dd($student_id, $day, $day_no);
    }

    public function show(Supervisor $supervisor)
    {
        //
    }

    public function edit(Supervisor $supervisor)
    {
        //
    }

    public function update(Request $request)
    {
        // Find the supervisor by ID
        $supervisor = Supervisor::findOrFail($request->id);
    
        // Validate the incoming data
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|max:255|unique:supervisors,username,' . $request->id, // Exclude current username
            'category' => 'nullable|string|max:255',
            'office' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8', // Optional password validation
        ]);
    
        // Update supervisor fields
        $supervisor->first_name = $request->input('firstname');
        $supervisor->middle_name = $request->input('middlename');
        $supervisor->last_name = $request->input('lastname');
        $supervisor->username = $request->input('username');
        $supervisor->category = $request->input('category');
        $supervisor->office = $request->input('office');
    
        // If a password is provided, hash it and update the password
        if ($request->filled('password')) {
            $supervisor->password = bcrypt($request->input('password')); // Hash the password
        }
    
        // Save the updated supervisor
        $supervisor->save();
    
        // Redirect back with success message
        return back()->with('success', 'Supervisor updated successfully!');
    }
    
    

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|username',
            'password' => 'required|min:8',
        ]);

        if (Auth::guard('supervisor')->attempt($credentials)) {
            // Authentication passed
            return redirect()->intended(route('supervisor.dashboard'));
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::guard('supervisor')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('site.index');
    }


    public function destroy(Supervisor $supervisor)
    {
        // Delete the supervisor
        $supervisor->delete();
    
        // Redirect back with a success message
        return back()->with('success', 'Supervisor deleted successfully!');
    }
    


    public function supervisorEvaluate(){

        $user =  Auth::user();

        $office = $user->office;

        $students = Student::where('designation', $office)->paginate();

        return view('supervisor.evaluate.index', [
            'students' => $students,
        ]);
    }

    public function evaluationForm(){
        return view('supervisor.evaluate.evaluation_form');
    }
}
