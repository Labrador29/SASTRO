<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;

class MassUserImport implements ToCollection
{
    use Importable;

    public function collection(Collection $rows)
{
    // Lewati header (baris pertama)
    $rows = $rows->skip(1);

    foreach ($rows as $row) {
        // Buat pengguna baru
        $user = User::create([
            'name' => $row[0], // Kolom Nama
            'email' => $row[1], // Kolom Email
            'password' => Hash::make($row[2]), // Kolom Password
            'role' => 'alumni',
        ]);

        // Generate QR Code untuk setiap pengguna
        $user->generateQRCode();
    }
}

}
