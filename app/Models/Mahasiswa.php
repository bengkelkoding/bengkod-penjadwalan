<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = "mahasiswa";

    protected $guarded = [];

    public function user() {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function schedules() {
        return $this->belongsToMany(\App\Models\Schedule::class, 'mahasiswa_schedules', 'mahasiswa_id', 'schedule_id');
    }
}
