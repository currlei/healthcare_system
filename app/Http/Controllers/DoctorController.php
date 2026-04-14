<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        if (auth()->user()->role !== 'admin') abort(403, 'Admin Access Required');
        return view('doctors.create');
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') abort(403);
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'specialization' => 'required',
            'contact_number' => 'required',
            'email' => 'required|email',
        ]);
        Doctor::create($validated);
        return redirect()->route('doctors.index');
    }

    public function edit(Doctor $doctor)
    {
        if (auth()->user()->role !== 'admin') abort(403);
        return view('doctors.edit', compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        if (auth()->user()->role !== 'admin') abort(403);
        $doctor->update($request->all());
        return redirect()->route('doctors.index');
    }

    public function destroy(Doctor $doctor)
    {
        if (auth()->user()->role !== 'admin') abort(403);
        $doctor->delete();
        return redirect()->route('doctors.index');
    }
}