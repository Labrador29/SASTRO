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
    public function member()
    {
        return $this->hasOne(Member::class);
    }


    // Generate QR Code untuk user
    public function generateQRCode()
    {
        $this->qr_code = uniqid('USR');
        $this->save();

        return QrCode::size(300)
            ->generate($this->qr_code);
    }
}
