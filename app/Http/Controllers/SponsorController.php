<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsor = Sponsor::paginate(5);
        return view('admin.sponsor.index', compact('sponsor'));
    }
    public function create()
    {
        return view('admin.sponsor.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'tanggal' => 'required|date',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif',
        ]);

        $data = $request->only(['nama', 'tanggal']);

        if ($request->hasFile('logo')) {
            $fileName = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('assets/sponsor'), $fileName);
            $data['logo'] = $fileName;
        }

        Sponsor::create($data);

        return redirect()->route('sponsor.index')->with('success', 'Data Sponsor berhasil ditambahkan!');
    }
    public function edit(Sponsor $Sponsor)
    {
        return view('admin.sponsor.edit', compact('Sponsor'));
    }
    public function update(Request $request, sponsor $sponsor)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'tanggal' => 'required|date',
        ]);
        $data = $request->only(['nama', 'tanggal']);

        if ($request->hasFile('logo')) {
            if ($sponsor->logo && file_exists(public_path('assets/sponsor/' . $sponsor->logo))) {
                unlink(public_path('assets/sponsor/' . $sponsor->logo));
            }

            $fileName = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('assets/sponsor'), $fileName);
            $data['logo'] = $fileName;
        }

        $sponsor->update($data);


        return redirect()->route('sponsor.index')->with('success', 'Data sponsor berhasil diubah.');
    }
    public function destroy(Sponsor $Sponsor)
    {
        $Sponsor->delete();
        return redirect()->route('sponsor.index')->with('success', 'Berita berhasil dihapus.');
    }
}
