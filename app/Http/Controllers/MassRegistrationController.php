<?php

namespace App\Http\Controllers;

use App\Imports\MassUserImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MassRegistrationController extends Controller
{
    // Menampilkan form unggah file
    public function showForm()
    {
        return view('admin.auth.mass-register');
    }

    // Memproses file Excel yang diunggah
    public function processForm(Request $request)
    {
        // Validasi file Excel
        $request->validate([
            'excel_file' => 'required|file|mimes:xlsx,xls,csv|max:2048', // Maksimal ukuran 2MB
        ]);

        // Ambil file dari form
        $file = $request->file('excel_file');

        // Impor data dari file Excel menggunakan MassUserImport
        Excel::import(new MassUserImport, $file);

        // Beri notifikasi sukses
        return redirect()->route('admin.mass.register.form')->with('success', 'Pendaftaran massal berhasil!');
    }
}
