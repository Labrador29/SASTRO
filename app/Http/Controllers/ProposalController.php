<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function index()
    {
        $proposals = Proposal::all();
        return view('admin.arsip.proposal.index', compact('proposals'));
    }

    public function create()
    {
        return view('admin.arsip.proposal.form');
    }

    public function edit(Proposal $proposal)
    {
        return view('admin.arsip.proposal.form', compact('proposal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'bagian' => 'required|string',
            'mentahan' => 'required|file|mimes:pdf',
        ]);

        // Simpan file mentahan
        $mentahanFile = $request->file('mentahan');
        $mentahanPath = 'proposal/' . time() . '_' . $mentahanFile->getClientOriginalName();
        $mentahanFile->move(public_path('proposal'), $mentahanPath);

        Proposal::create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'bagian' => $request->bagian,
            'mentahan' => $mentahanPath,
        ]);

        return redirect()->route('proposal.index')->with('success', 'Proposal berhasil ditambahkan.');
    }

    public function update(Request $request, Proposal $proposal)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'bagian' => 'required|string',
            'mentahan' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        // Perbarui file mentahan jika ada file baru
        if ($request->hasFile('mentahan')) {
            if ($proposal->mentahan && file_exists(public_path($proposal->mentahan))) {
                unlink(public_path($proposal->mentahan));
            }

            $mentahanFile = $request->file('mentahan');
            $mentahanPath = 'proposal/' . time() . '_' . $mentahanFile->getClientOriginalName();
            $mentahanFile->move(public_path('proposal'), $mentahanPath);

            $proposal->mentahan = $mentahanPath;
        }

        $proposal->update([
            'nama_kegiatan' => $request->nama_kegiatan,
            'bagian' => $request->bagian,
        ]);

        return redirect()->route('proposal.index')->with('success', 'Proposal berhasil diperbarui.');
    }

    public function uploadTtd(Request $request, Proposal $proposal)
    {
        $request->validate([
            'ttd' => 'required|file|mimes:pdf',
        ]);

        if ($proposal->ttd && file_exists(public_path($proposal->ttd))) {
            unlink(public_path($proposal->ttd));
        }

        $ttdFile = $request->file('ttd');
        $ttdPath = 'proposal/ttd_' . time() . '_' . $ttdFile->getClientOriginalName();
        $ttdFile->move(public_path('proposal'), $ttdPath);

        $proposal->ttd = $ttdPath;
        $proposal->save();

        return redirect()->route('proposal.index')->with('success', 'TTD berhasil diunggah.');
    }

    public function destroy(Proposal $proposal)
    {
        if ($proposal->mentahan && file_exists(public_path($proposal->mentahan))) {
            unlink(public_path($proposal->mentahan));
        }

        if ($proposal->ttd && file_exists(public_path($proposal->ttd))) {
            unlink(public_path($proposal->ttd));
        }

        $proposal->delete();

        return redirect()->route('proposal.index')->with('success', 'Proposal berhasil dihapus.');
    }

    public function download($type, Proposal $proposal)
    {
        $filePath = $type === 'mentahan' ? $proposal->mentahan : $proposal->ttd;
        if (file_exists(public_path($filePath))) {
            return response()->download(public_path($filePath));
        }

        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }
}
