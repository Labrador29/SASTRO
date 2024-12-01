<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProkerController extends Controller
{
    public function index()
    {
        return view('admin.proker.index');
    }
}
