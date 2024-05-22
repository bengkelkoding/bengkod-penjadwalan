<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scheduleSessions()
    {
        return $this->hasMany(ScheduleSession::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id', 'id');
    }

    public function mahasiswas() {
        return $this->belongsToMany(\App\Models\Mahasiswa::class, 'mahasiswa_schedules', 'schedule_id', 'mahasiswa_id');
    }
}
