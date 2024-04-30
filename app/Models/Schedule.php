<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function scheduleSessions() {
        return $this->hasMany(\App\Models\ScheduleSession::class);
    }
}
