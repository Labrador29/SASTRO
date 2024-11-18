<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    // Nama tabel berita
    protected $table = 'berita';

    // Kolom yang dapat diisi
    protected $fillable = ['judul', 'isi', 'tag_id', 'tanggal_berita', 'foto'];

    /**
     * Relasi: Berita dimiliki oleh satu kategori.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'tag_id'); // Sesuai dengan nama kolom di database Anda
    }
}
