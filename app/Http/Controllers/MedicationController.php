<?php

namespace App\Http\Controllers;

use App\Models\Medication;
use Illuminate\Http\Request;

class MedicationController extends Controller
{
    public function index()
    {
        $medications = Medication::all();
        return view('medications.index', compact('medications'));
    }

    public function create()
    {
        if (auth()->user()->role !== 'admin') abort(403);
        return view('medications.create');
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') abort(403);
        $validated = $request->validate([
            'name' => 'required',
            'dosage' => 'required',
            'description' => 'required',
        ]);
        Medication::create($validated);
        return redirect()->route('medications.index');
    }

    public function show(Medication $medication)
    {
    return view('medications.show', compact('medication')); 
}

  public function edit(Medication $medication)
{
    if (auth()->user()->role !== 'admin') abort(403);
    return view('medications.edit', compact('medication'));
}

    public function update(Request $request, Medication $medication)
    {
        if (auth()->user()->role !== 'admin') abort(403);
        $medication->update($request->all());
        return redirect()->route('medications.index');
    }

    public function destroy(Medication $medication)
    {
        if (auth()->user()->role !== 'admin') abort(403);
        $medication->delete();
        return redirect()->route('medications.index');
    }
}