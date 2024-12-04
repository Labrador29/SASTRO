<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\News;
use App\Models\Struktur;
use App\Models\Sponsor;
use App\Models\proker;
use App\Models\Kegiatan;
use App\Models\Halaman;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $news = News::with('category')->orderBy('tanggal_berita', 'desc')->get();
        $sponsor = Sponsor::all();
        $bidangs = Bidang::all();
        $background = Halaman::where('bagian', 'background')->get();
        $about = Halaman::where('bagian', 'about')->get();
        $pendaftaran = Halaman::where('bagian', 'pendaftaran')->get();

        return view('beranda.home.index', compact('news', 'bidangs', 'sponsor', 'background', 'about', 'pendaftaran'));
    }


    public function about()
    {
        return view('beranda.about.index');
    }

    public function kegiatan()
    {
        $Kegiatan = Kegiatan::all();
        $operasional = Kegiatan::where('jenis', 'operasional')->get();
        $partisipasi = Kegiatan::where('jenis', 'partisipasi')->get();
        return view('beranda.kegiatan.index', compact('operasional', 'partisipasi'));
    }

    public function proker()
    {
        $proker = proker::all();
        return view('beranda.proker.index', compact('proker'));
    }

    public function materi()
    {
        return view('beranda.materi.index');
    }

    public function organisasi(Request $request)
    {
        // Ambil tahun dari parameter URL atau gunakan tahun terbaru secara default
        $selectedYear = $request->get('year');
        $defaultYear = Struktur::where('jabatan', '!=', 'Pembina')->max('tahun'); // Tahun terbaru untuk data selain Pembina
        $filterYear = $selectedYear ?? $defaultYear;

        // Ambil data pembina (tidak terpengaruh filter tahun)
        $strukturs = Struktur::where('jabatan', 'Pembina')->get();

        // Ambil data pengurus berdasarkan tahun
        $pengurus = Struktur::where('jabatan', '!=', 'Pembina')
            ->where('tahun', $filterYear)
            ->get();

        // Ambil daftar tahun untuk dropdown
        $years = Struktur::where('jabatan', '!=', 'Pembina')
            ->select('tahun')
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

        return view('beranda.organisasi.index', compact('strukturs', 'pengurus', 'filterYear', 'years'));
    }


    public function berita()
    {
        $news = News::with('category')->orderBy('tanggal_berita', 'desc')->get();
        return view('beranda.berita.index', compact('news'));
    }

    public function beritaDetail($id)
    {
        $news = News::with('category')->findOrFail($id);
        return view('beranda.berita.detail', compact('news'));
    }
}
