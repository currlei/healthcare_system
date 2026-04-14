<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        // TASK: Eager Loading + Ownership (Only see patients you created)
        $patients = Patient::with(['doctor'])
                    ->where('user_id', auth()->id())
                    ->get();

        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        $doctors = Doctor::all();
        return view('patients.create', compact('doctors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required',
            'contact_number' => 'required',
            'address' => 'required',
            'doctor_id' => 'required|exists:doctors,id',
        ]);

        $validated['user_id'] = auth()->id(); // Assign ownership
        Patient::create($validated);

        return redirect()->route('patients.index')->with('success', 'Patient added successfully.');
    }

    public function show(Patient $patient)
    {
        if ($patient->user_id !== auth()->id()) abort(403); // Ownership Security
        return view('patients.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        if ($patient->user_id !== auth()->id()) abort(403);
        $doctors = Doctor::all();
        return view('patients.edit', compact('patient', 'doctors'));
    }

    public function update(Request $request, Patient $patient)
    {
        if ($patient->user_id !== auth()->id()) abort(403);
        
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'doctor_id' => 'required',
        ]);

        $patient->update($validated);
        return redirect()->route('patients.index')->with('success', 'Patient updated.');
    }

    public function destroy(Patient $patient)
    {
        if ($patient->user_id !== auth()->id()) abort(403);
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient deleted.');
    }
}