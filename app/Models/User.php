<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'angkatan',
        'jabatan',
        'qr_code',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
    public function updateRole()
    {
        $selisihTahun = now()->year - $this->angkatan;

        // Update role berdasarkan selisih tahun
        if ($selisihTahun > 2 && $this->role !== 'alumni') {
            $this->role = 'alumni';
            $this->save();
        }
    }


    // Generate QR Code untuk user
    public function generateQRCode()
    {
        $this->qr_code = uniqid('USR');
        $this->save();

        return \SimpleSoftwareIO\QrCode\Facades\QrCode::size(300)->generate($this->qr_code);
    }
}
