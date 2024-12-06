<?php

namespace App\Http\Controllers;

use App\Imports\MassStruktur;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class MassStrukturController extends Controller
{
    public function showForm()
    {
        return view(
            'admin.struktur.import',
            ['title' => 'Admin | Tambah Struktur']
        );
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls|max:10240',
        ]);

        try {
            Excel::import(new MassStruktur, $request->file('file'));

            return back()->with('success', 'Data berhasil diimport!');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
