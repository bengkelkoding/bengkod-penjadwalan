<?php

use App\Http\Controllers\Admin\ClassroomController;
use App\Http\Controllers\Admin\ScheduleController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('home');
});

Route::get('/mahasiswa', function () {
    return view('student.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/classrooms', [ClassroomController::class, 'index'])->name('classroom.index');

    Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedule.index');
    Route::post('/schedules/import', [ScheduleController::class, 'import'])->name('schedule.import');
});

require __DIR__.'/auth.php';
