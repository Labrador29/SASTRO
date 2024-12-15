<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        $materi = Materi::all();
        return view('admin.materi.index', compact('materi'));
    }

    public function create()
    {
        return view('admin.materi.form');
    }

    public function edit(Materi $materi)
    {
        return view('admin.materi.form', compact('materi'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,ppt,pptx,doc,docx',
        ]);

        // Tentukan path penyimpanan file
        $file = $request->file('file');
        $filePath = 'file/' . time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('file'), $filePath);

        Materi::create([
            'judul' => $request->judul,
            'file_path' => $filePath,
            'is_hidden' => $request->has('is_hidden'),
        ]);

        return redirect()->route('materi.index')->with('success', 'Materi berhasil ditambahkan.');
    }

    public function update(Request $request, Materi $materi)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,ppt,pptx,doc,docx',
        ]);

        if ($request->hasFile('file')) {
            // Hapus file lama
            if ($materi->file_path && file_exists(public_path($materi->file_path))) {
                unlink(public_path($materi->file_path));
            }

            // Upload file baru
            $file = $request->file('file');
            $filePath = 'file/' . time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('file'), $filePath);

            $materi->file_path = $filePath;
        }

        $materi->update([
            'judul' => $request->judul,
            'is_hidden' => $request->has('is_hidden'),
        ]);

        return redirect()->route('materi.index')->with('success', 'Materi berhasil diperbarui.');
    }

    public function destroy(Materi $materi)
    {
        // Hapus file dari public/file/
        if ($materi->file_path && file_exists(public_path($materi->file_path))) {
            unlink(public_path($materi->file_path));
        }

        // Hapus data dari database
        $materi->delete();

        return redirect()->route('materi.index')->with('success', 'Materi berhasil dihapus.');
    }
    public function download(Materi $materi)
    {
        if (file_exists(public_path($materi->file_path))) {
            $extension = pathinfo($materi->file_path, PATHINFO_EXTENSION);
            $fileName = $materi->judul . '.' . $extension;
            return response()->download(public_path($materi->file_path), $fileName);
        }
        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }
}
