<?php

namespace App\Http\Controllers;

use App\Imports\MassStruktur;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class MassStrukturController extends Controller
{
    // Menampilkan form untuk upload file Excel
    public function showForm()
    {
        return view('admin.struktur.import'); // Sesuaikan dengan view Anda untuk form upload
    }

    // Menangani upload dan import data Excel
    public function import(Request $request)
    {
        // Validasi file yang diupload
        $request->validate([
            'file' => 'required|mimes:xlsx,xls|max:10240', // maksimal 10MB
        ]);

        // Proses import
        try {
            // Menggunakan MassStruktur untuk memproses file yang diupload
            Excel::import(new MassStruktur, $request->file('file'));

            return back()->with('success', 'Data berhasil diimport!');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
