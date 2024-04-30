<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleSession extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function classrooms() {
        return $this->belongsTo(\App\Models\Classroom::class);
    }
}
