<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scheduleSession() {
        return $this->belongsTo(\App\Models\ScheduleSession::class);
    }

    public function presenceAttendances() {
        return $this->hasMany(\App\Models\PresenceAttendance::class);
    }

    public function presenceAbsences() {
        return $this->hasMany(\App\Models\PresenceAbsence::class);
    }
}
