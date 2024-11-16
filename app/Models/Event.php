<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'description',
        'event_date',
        'location'
    ];

    protected $casts = [
        'event_date' => 'datetime'
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
