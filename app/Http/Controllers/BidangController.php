<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\Request;

class BidangController extends Controller
{
    public function index()
    {
        $bidang = Bidang::all();
        return view('admin.bidang.index', compact('bidang'));
    }

    public function create()
    {
        return view('admin.bidang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bidang' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data = $request->only(['nama_bidang', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            $fileName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('assets/bidang'), $fileName);
            $data['gambar'] = $fileName;
        }

        Bidang::create($data);

        return redirect()->route('bidang.index')->with('success', 'Bidang berhasil ditambahkan!');
    }

    public function edit(Bidang $bidang)
    {
        return view('admin.bidang.edit', compact('bidang'));
    }

    public function update(Request $request, Bidang $bidang)
    {
        $request->validate([
            'nama_bidang' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data = $request->only(['nama_bidang', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            if ($bidang->gambar && file_exists(public_path('assets/bidang/' . $bidang->gambar))) {
                unlink(public_path('assets/bidang/' . $bidang->gambar));
            }

            $fileName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('assets/bidang'), $fileName);
            $data['gambar'] = $fileName;
        }

        $bidang->update($data);

        return redirect()->route('bidang.index')->with('success', 'Bidang berhasil diperbarui!');
    }

    public function destroy(Bidang $bidang)
    {
        $bidang->delete();

        return redirect()->route('bidang.index')->with('success', 'Bidang berhasil dihapus!');
    }
}
