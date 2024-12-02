<?php

namespace App\Http\Controllers;

use App\Models\Proker;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all Proker records
        $prokers = Proker::all();

        // Render the view with the data
        return view('admin.proker.index', compact('prokers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Render the form view
        return view('proker.Form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'Tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'status' => ['required', Rule::in(['Terlaksana', 'Proses', 'Tidak Terlaksana'])],
        ]);

        // Create a new Proker record
        Proker::create($validated);

        // Redirect with success message
        return redirect()->route('proker.index')->with('success', 'Proker created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proker $proker)
    {
        // Render the form view with Proker data
        return view('admin.proker.Form', compact('proker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proker $proker)
    {
        // Validate input
        $validated = $request->validate([
            'nama' => 'sometimes|string|max:255',
            'Tanggal' => 'sometimes|date',
            'lokasi' => 'sometimes|string|max:255',
            'status' => ['sometimes', Rule::in(['Terlaksana', 'Proses', 'Tidak Terlaksana'])],
        ]);

        // Update the Proker record
        $proker->update($validated);

        // Redirect with success message
        return redirect()->route('proker.index')->with('success', 'Proker updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proker $proker)
    {
        // Delete the Proker record
        $proker->delete();

        // Redirect with success message
        return redirect()->route('proker.index')->with('success', 'Proker deleted successfully.');
    }
}
