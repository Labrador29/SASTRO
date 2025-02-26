<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Halaman extends Model
{
    use HasFactory;

    // Nama tabel berita
    protected $table = 'halaman';

    // Kolom yang dapat diisi
    protected $fillable = ['foto', 'bagian'];
}
