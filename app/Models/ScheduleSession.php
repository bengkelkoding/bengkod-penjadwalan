<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleSession extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function schedule() {
        return $this->belongsTo(\App\Models\Schedule::class);
    }

    public function classroom()
    {
        return $this->belongsTo(\App\Models\Classroom::class, 'classroom_id', 'id');
    }

    public function presences() {
        return $this->hasMany(\App\Models\Presence::class);
    }
}
