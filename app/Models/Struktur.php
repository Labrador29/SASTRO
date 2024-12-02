<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Struktur extends Model
{
    use HasFactory;

    protected $table = 'struktur'; // Nama tabel baru
    protected $fillable = [
        'nama_panjang',
        'jabatan',
        'NTA',
        'tahun',
        'foto',
    ];
    
    protected static function booted()
    {
        static::deleting(function ($struktur) {
            if ($struktur->foto && file_exists(public_path($struktur->foto))) {
                unlink(public_path($struktur->foto));
            }
        });
    }
}
