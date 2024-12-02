<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proker extends Model
{
    use HasFactory;

    // Nama tabel berita
    protected $table = 'proker';

    // Kolom yang dapat diisi
    protected $fillable = ['nama', 'Tanggal', 'lokasi', 'status'];
}
