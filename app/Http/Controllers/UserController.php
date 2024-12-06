<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        if ($search) {
            $users = User::where('name', 'like', '%' . $search . '%')
                ->orWhere('name', 'like', '%' . $search . '%')
                ->paginate(5);
        } else {
            $users = User::paginate(5);
        }

        return view(
            'admin.users.index',
            ['title' => 'Admin | User'],
            compact('users')
        );
    }
}
