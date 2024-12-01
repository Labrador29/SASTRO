<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\News;
use App\Models\Struktur;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $news = News::with('category')->orderBy('tanggal_berita', 'desc')->get();

        $bidangs = Bidang::all();

        return view('beranda.home.index', compact('news', 'bidangs'));
    }


    public function about()
    {
        return view('beranda.about.index');
    }

    public function kegiatan()
    {
        return view('beranda.kegiatan.index');
    }

    public function program()
    {
        return view('beranda.program.index');
    }

    public function organisasi()
    {
        $strukturs = Struktur::where('jabatan', 'Pembina')->get();
        $pengurus = Struktur::where('jabatan', '!=', 'Pembina')->get();
        return view('beranda.organisasi.index', compact('strukturs', 'pengurus'));
    }

    public function berita()
    {
        $news = News::with('category')->orderBy('tanggal_berita', 'desc')->get();
        return view('berita.index', compact('news'));
    }

    public function beritaDetail($id)
    {
        $news = News::with('category')->findOrFail($id);
        return view('berita.detail', compact('news'));
    }
}
