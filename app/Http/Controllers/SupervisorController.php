<?php 

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SupervisorController extends Controller
{
    public function index()
    {
        $categories = Category::all(); // Fetch all categories

        return view('admin.supervisor.index', [
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        //
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

    public function destroy(Supervisor $supervisor)
    {
        //
    }
}
