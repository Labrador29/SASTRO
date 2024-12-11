<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;



class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }

    public function update(Request $request, User $user)
    {
        // Validasi data yang dikirimkan
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
            'password' => 'required|min:8|confirmed',
        ]);

        // Dapatkan user yang sedang login
        $user = auth()->user();

        // Update nama dan email
        $user->name = $validated['name'];
        $user->email = $validated['email'];

        // Jika password diisi, update password
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        // Simpan perubahan
        $user->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
