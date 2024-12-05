<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::all();
        return view('admin.kegiatan.index', compact('kegiatan'));
    }
    public function create()
    {
        // Render the form view
        return view('admin.kegiatan.Form');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:500',
            'tanggal' => 'required|date',
            'jenis' => 'required|string|in:Operasional,Partisipasi',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $filename = time() . '.' . $request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('assets/kegiatan'), $filename);
            $validated['foto'] = $filename;
        }

        Kegiatan::create($validated);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }
    public function edit(Kegiatan $kegiatan)
    {
        // Render the form view with kegi$kegiatan data
        return view('admin.kegiatan.Form', compact('kegiatan'));
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:500',
            'tanggal' => 'required|date',
            'jenis' => 'required|string|in:Operasional,Partisipasi',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($kegiatan->foto && File::exists(public_path('assets/kegiatan/' . $kegiatan->foto))) {
                File::delete(public_path('assets/kegiatan/' . $kegiatan->foto));
            }
            $filename = time() . '.' . $request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('assets/kegiatan'), $filename);
            $validated['foto'] = $filename;
        }

        $kegiatan->update($validated);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }
    public function destroy(Kegiatan $kegiatan)
    {
        // Hapus foto terkait jika ada
        if ($kegiatan->foto && File::exists(public_path('assets/kegiatan/' . $kegiatan->foto))) {
            File::delete(public_path('assets/kegiatan/' . $kegiatan->foto));
        }

        // Hapus data kegiatan
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
