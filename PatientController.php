<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    // Display a list of patients
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    // Show the form for creating a new patient
    public function create()
    {
        return view('patients.create');
    }

    // Store a newly created patient in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|in:Male,Female,Other',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        $patient = Patient::create($validatedData);

        return redirect()->route('patients.index')->with('success', 'Patient created successfully');
    }

    // Display the specified patient
    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.show', compact('patient'));
    }

    // Show the form for editing the specified patient
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    // Update the specified patient in the database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|in:Male,Female,Other',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        $patient = Patient::findOrFail($id);
        $patient->update($validatedData);

        return redirect()->route('patients.index')->with('success', 'Patient updated successfully');
    }

    // Remove the specified patient from the database
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully');
    }
}

