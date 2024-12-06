<?php

namespace App\Http\Controllers;

use App\Models\Proker;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProkerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        if ($search) {
            $prokers = Proker::where('nama', 'like', '%' . $search . '%')
                ->orWhere('nama', 'like', '%' . $search . '%')
                ->paginate(5);
        } else {
            $prokers = Proker::paginate(5);
        }

        // $prokers = Proker::all();
        // $prokers = Proker::paginate(5);

        return view(
            'admin.proker.index',
            ['title' => 'Admin | Proker'],
            compact('prokers')
        );
    }

    public function create()
    {
        return view(
            'admin.proker.Form',
            ['title' => 'Admin | Tambah Struktur']
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'Tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'status' => ['required', Rule::in(['Terlaksana', 'Proses', 'Tidak Terlaksana'])],
        ]);

        Proker::create($validated);

        return redirect()->route('proker.index')
            ->with('success', 'Proker created successfully.');
    }

    public function edit(Proker $proker)
    {
        return view(
            'admin.proker.Form',
            ['title' => 'Admin | Edit Struktur'],
            compact('proker')
        );
    }


    public function update(Request $request, Proker $proker)
    {
        $validated = $request->validate([
            'nama' => 'sometimes|string|max:255',
            'Tanggal' => 'sometimes|date',
            'lokasi' => 'sometimes|string|max:255',
            'status' => ['sometimes', Rule::in(['Terlaksana', 'Proses', 'Tidak Terlaksana'])],
        ]);

        $proker->update($validated);

        return redirect()->route('proker.index')
            ->with('success', 'Proker updated successfully.');
    }

    public function destroy(Proker $proker)
    {
        $proker->delete();

        return redirect()->route('proker.index')
            ->with('success', 'Proker deleted successfully.');
    }
}
