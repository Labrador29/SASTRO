<?php

namespace App\Http\Controllers;

use App\Imports\MassUserImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MassRegistrationController extends Controller
{
    public function showForm()
    {
        return view('admin.auth.mass-register');
    }

    public function processForm(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|file|mimes:xlsx,xls,csv|max:2048',
        ]);

        $file = $request->file('excel_file');
        Excel::import(new MassUserImport, $file);

        return redirect()->route('admin.mass.register.form')->with('success', 'Pendaftaran massal berhasil!');
    }
}
