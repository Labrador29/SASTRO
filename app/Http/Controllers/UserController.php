<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        if ($search) {
            $users = User::where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
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

    public function edit(User $user)
    {
        return view(
            'admin.users.edit',
            ['title' => 'Admin | Edit User'],
            compact('user')
        );
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed|min:6',
            'angkatan' => 'required|integer|min:2000|max:' . now()->year,
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->angkatan = $validated['angkatan'];

        // Logika untuk menentukan role
        $currentYear = now()->year;
        if ($currentYear - $user->angkatan <= 2) {
            $user->role = 'pengurus_aktif'; // Maksimal dua tahun ke belakang
        } else {
            $user->role = 'alumni'; // Lebih dari dua tahun
        }

        // Perbarui password jika ada
        if ($request->password) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('users.index')
            ->with('success', 'Data pengguna berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Pengguna berhasil dihapus.');
    }
}
