<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\News;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        // Mengambil 5 berita terbaru dengan relasi kategori
        $news = News::with('category')->orderBy('tanggal_berita', 'desc')->limit(5)->get();

        // Mengambil data bidang (jika masih diperlukan)
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

    public function organisasi()
    {
        return view('beranda.organisasi.index');
    }
    public function berita()
    {
        // Mengambil semua berita dengan relasi kategori
        $news = News::with('category')->orderBy('tanggal_berita', 'desc')->get();
        return view('berita.index', compact('news'));
    }
    public function beritaDetail($id)
    {
        // Ambil berita berdasarkan ID dengan relasi kategori
        $news = News::with('category')->findOrFail($id);
        return view('berita.detail', compact('news'));
    }
}
