<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use Illuminate\Http\Request;

class StrukturController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        if ($search) {
            $strukturs = Struktur::where('nama_panjang', 'like', '%' . $search . '%')
                ->orWhere('nama_panjang', 'like', '%' . $search . '%')
                ->paginate(5);
        } else {
            $strukturs = Struktur::paginate(5);
        }

        return view('admin.struktur.index', compact('strukturs'))
            ->with('title', 'Admin | Struktur');
    }


    public function create()
    {
        return view(
            'admin.struktur.create',
            ['title' => 'Admin | Tambah Struktur']
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_panjang' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'NTA' => 'required|string|max:50',
            'tahun' => 'required|integer|min:2000|max:' . date('Y'),
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/struktur'), $filename);
            $validated['foto'] = 'assets/struktur/' . $filename;
        }

        Struktur::create($validated);

        return redirect()->route('struktur.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(Struktur $struktur)
    {
        return view(
            'admin.struktur.edit',
            ['title' => 'Admin | Edit Struktur'],
            compact('struktur')
        );
    }

    public function update(Request $request, Struktur $struktur)
    {
        $validated = $request->validate([
            'nama_panjang' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'NTA' => 'required|string|max:50',
            'tahun' => 'required|integer|min:2000|max:' . date('Y'),
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($struktur->foto && file_exists(public_path($struktur->foto))) {
                unlink(public_path($struktur->foto));
            }

            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/struktur'), $filename);
            $validated['foto'] = 'assets/struktur/' . $filename;
        }

        $struktur->update($validated);

        return redirect()->route('struktur.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Struktur $struktur)
    {
        if ($struktur->foto && file_exists(public_path($struktur->foto))) {
            unlink(public_path($struktur->foto));
        }

        $struktur->delete();

        return redirect()->route('struktur.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
