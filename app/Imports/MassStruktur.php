<?php

namespace App\Imports;

use App\Models\Struktur;  // Sesuaikan dengan model Struktur Anda
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class MassStruktur implements ToCollection
{
    public function collection(Collection $rows)
    {
        // Lewati header (baris pertama)
        $rows = $rows->skip(1);

        foreach ($rows as $row) {
            // Buat struktur baru
            Struktur::create([
                'nama_panjang' => $row[0], // Kolom Nama
                'jabatan' => $row[1], // Kolom Jabatan
                'NTA' => $row[2], // Kolom NTA
                'tahun' => $row[3], // Kolom Tahun
                'foto' => null, // Foto dianggap null
            ]);
        }
    }
}
