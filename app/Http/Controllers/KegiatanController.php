<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KegiatanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        if ($search) {
            $kegiatan = kegiatan::where('nama', 'like', '%' . $search . '%')
                ->orWhere('nama', 'like', '%' . $search . '%')
                ->paginate(5);
        } else {
            $kegiatan = kegiatan::paginate(5);
        }

        return view(
            'admin.kegiatan.index',
            ['title' => 'Admin | Kegiatan'],
            compact('kegiatan')
        );
    }


    public function create()
    {
        return view(
            'admin.kegiatan.Form',
            ['title' => 'Admin | Tambah Kegiatan']
        );
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

        return redirect()->route('kegiatan.index')
            ->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function edit(Kegiatan $kegiatan)
    {
        return view(
            'admin.kegiatan.Form',
            ['title' => 'Admin | Edit Kegiatan'],
            compact('kegiatan')
        );
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

        $changes = [];

        // Cek perubahan data teks
        foreach (['nama', 'deskripsi', 'tanggal', 'jenis'] as $field) {
            if ($kegiatan->$field !== $request->$field) {
                $changes[$field] = $request->$field;
            }
        }

        // Cek perubahan pada foto
        if ($request->hasFile('foto')) {
            if ($kegiatan->foto && File::exists(public_path('assets/kegiatan/' . $kegiatan->foto))) {
                File::delete(public_path('assets/kegiatan/' . $kegiatan->foto));
            }
            $filename = time() . '.' . $request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('assets/kegiatan'), $filename);
            $changes['foto'] = $filename;
        }

        // Jika tidak ada perubahan, kembalikan pesan info
        if (empty($changes)) {
            return redirect()->route('kegiatan.index')
                ->with('info', 'Tidak ada data yang diperbarui.');
        }

        // Perbarui data yang berubah
        $kegiatan->update($changes);

        return redirect()->route('kegiatan.index')
            ->with('success', 'Kegiatan berhasil diperbarui.');
    }



    public function destroy(Kegiatan $kegiatan)
    {
        if ($kegiatan->foto && File::exists(public_path('assets/kegiatan/' . $kegiatan->foto))) {
            File::delete(public_path('assets/kegiatan/' . $kegiatan->foto));
        }

        $kegiatan->delete();

        return redirect()->route('kegiatan.index')
            ->with('success', 'Kegiatan berhasil dihapus.');
    }
}
