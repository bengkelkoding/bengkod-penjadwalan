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

    public function scheduleSessionsRelation()
    {
        return $this->belongsTo(ScheduleSession::class, 'id', 'schedule_id');
    }
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id', 'id');
    }
}
