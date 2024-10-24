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

        $attendances = Questionnaire::where('type' , 'Attendance')->get();

        $punctualities = Questionnaire::where('type' , 'Punctuality')->get();

        $initiatives = Questionnaire::where('type' , 'Initiative')->get();

        $plannings = Questionnaire::where('type' , 'Ability to Plan Activities')->get();

        $cooperations = Questionnaire::where('type' , 'Cooperation')->get();

        $interests = Questionnaire::where('type' , 'Interest and attitudes towards work')->get();

        $fields = Questionnaire::where('type' , 'Major Field of Concentration')->get();

        $appearances = Questionnaire::where('type' , 'Appearance')->get();

        $alertness = Questionnaire::where('type' , 'Alertness')->get();

        $self_confidence = Questionnaire::where('type' , 'Self-Confidence')->get();

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
        $validatedData = $request->validate([
            'first_name' => 'nullable|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:supervisors|max:255',
            'password' => 'required|string|min:8',
            'category' => 'required|string|max:255',
            'office' => 'required|string|max:255', // Add this validation
        ]);
        // dd($validatedData);

        Supervisor::create([
            'first_name' => $validatedData['first_name'],
            'middle_name' => $validatedData['middle_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'category' => $validatedData['category'],
            'office' => $validatedData['office'], // Save office as well
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

    public function update(Request $request, Supervisor $supervisor)
    {
        //
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
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
        //
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
