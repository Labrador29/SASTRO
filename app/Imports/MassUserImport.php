<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Member;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;

class MassUserImport implements ToCollection
{
    use Importable;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Ambil data dari setiap baris di Excel
            $user = User::create([
                'name' => $row[0],
                'email' => $row[1],
                'password' => bcrypt($row[2]), // Enkripsi password
                'role' => 'alumni', // Anda bisa menyesuaikan ini jika diperlukan
            ]);

            // Menambahkan data ke tabel members
            Member::create([
                'user_id' => $user->id,
                'angkatan' => $row[3],
                'bidang_id' => $this->getBidangId($row[4]), // Fungsi untuk mendapatkan bidang_id
                'instagram' => $row[5],
                'facebook' => $row[6],
                'x' => $row[7],
            ]);
        }
    }

    // Fungsi untuk mencari ID bidang berdasarkan nama bidang
    private function getBidangId($bidangName)
    {
        // Misalnya, kita asumsikan ada model Bidang untuk mencari berdasarkan nama
        return \App\Models\Bidang::where('name', $bidangName)->first()->id;
    }
}
