<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home.index');
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
