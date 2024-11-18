<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Nama tabel kategori
    protected $table = 'kategori';

    // Kolom yang dapat diisi
    protected $fillable = ['name', 'deskripsi'];

    /**
     * Relasi: Satu kategori memiliki banyak berita.
     */
    public function news()
    {
        return $this->hasMany(News::class, 'tag_id'); // Sesuai dengan nama kolom di database Anda
    }
}
