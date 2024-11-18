<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $bidangs = Bidang::all(); // Mengambil semua data bidang
        return view('home.index', compact('bidangs'));
    }

    public function about()
    {
        return view('about.index');
    }

    public function kegiatan()
    {
        return view('kegiatan.index');
    }

    public function organisasi()
    {
        return view('organisasi.index');
    }
    public function berita()
    {
        return view('berita.index');
    }
}
