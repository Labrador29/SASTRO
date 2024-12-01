<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    // Nama tabel berita
    protected $table = 'sponsor';

    // Kolom yang dapat diisi
    protected $fillable = ['nama', 'tanggal', 'logo'];
}
