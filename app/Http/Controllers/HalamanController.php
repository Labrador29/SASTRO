<?php

namespace App\Http\Controllers;

use App\Models\Halaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HalamanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        if ($search) {
            $halaman = Halaman::where('bagian', 'like', '%' . $search . '%')
                ->orWhere('bagian', 'like', '%' . $search . '%')
                ->paginate(5);
        } else {
            $halaman = Halaman::paginate(5);
        }

        return view(
            'admin.halaman.index',
            ['title' => 'Admin | Beranda'],
            compact('halaman')
        );
    }

    public function create()
    {
        return view(
            'admin.halaman.Form',
            ['title' => 'Admin | Tambah Beranda']
        );
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

        Halaman::create($validated);

        return redirect()->route('halaman.index')
            ->with('success', 'Halaman berhasil ditambahkan.');
    }

    public function edit(Halaman $halaman)
    {
        return view(
            'admin.halaman.Form',
            ['title' => 'Admin | Edit Beranda'],
            compact('halaman')
        );
    }

    public function update(Request $request, Halaman $halaman)
    {
        $validated = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'bagian' => 'required|string|max:255',
        ]);

        if ($request->hasFile('foto')) {
            if ($halaman->foto && File::exists(public_path('assets/halaman/' . $halaman->foto))) {
                File::delete(public_path('assets/halaman/' . $halaman->foto));
            }
            $filename = time() . '.' . $request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('assets/halaman'), $filename);
            $validated['foto'] = $filename;
        }

        $halaman->update($validated);

        return redirect()->route('admin.halaman.index')
            ->with('success', 'Halaman berhasil diperbarui.');
    }
}
