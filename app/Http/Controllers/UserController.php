<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Ambil semua user dengan relasi member dan bidang
        $users = User::with(['member.bidang'])->get();

        return view('admin.users.index', compact('users'));
    }
}
