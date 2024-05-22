<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresenceAttendance extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function presence() {
        return $this->belongsTo(\App\Models\Presence::class);
    }
}
