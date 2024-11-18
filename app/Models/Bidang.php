<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    protected $fillable = [
        'nama_bidang',
        'deskripsi',
        'gambar',
    ];

    protected $table = "bidang";

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
