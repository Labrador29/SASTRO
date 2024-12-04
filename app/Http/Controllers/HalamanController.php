<?php

namespace App\Http\Controllers;

use App\Models\Halaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HalamanController extends Controller
{
    public function index()
    {
        $halaman = halaman::all();
        return view('admin.halaman.index', compact('halaman'));
    }
    public function create()
    {
        // Render the form view
        return view('admin.halaman.Form');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'bagian' => 'required|string|max:255',
        ]);

        if ($request->hasFile('foto')) {
            $filename = time() . '.' . $request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('assets/halaman'), $filename);
            $validated['foto'] = $filename;
        }

        halaman::create($validated);

        return redirect()->route('halaman.index')->with('success', 'halaman berhasil ditambahkan.');
    }
    public function edit(halaman $halaman)
    {
        // Render the form view with kegi$halaman data
        return view('admin.halaman.Form', compact('halaman'));
    }

    public function update(Request $request, halaman $halaman)
    {
        $validated = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'bagian' => 'required|string|max:255',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($halaman->foto && File::exists(public_path('assets/halaman/' . $halaman->foto))) {
                File::delete(public_path('assets/halaman/' . $halaman->foto));
            }
            $filename = time() . '.' . $request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('assets/halaman'), $filename);
            $validated['foto'] = $filename;
        }

        $halaman->update($validated);

        return redirect()->route('halaman.index')->with('success', 'halaman berhasil diperbarui.');
    }
}
