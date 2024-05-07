<?php

use App\Http\Controllers\Admin\AbsentController;
use App\Http\Controllers\Admin\ClassroomController;
use App\Http\Controllers\Admin\ScheduleController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('home');
});

Route::get('/admin', function () {
    return view('admin.index');
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
    Route::get('/absent', [AbsentController::class, 'index'])->name('absent.index');
    Route::post('/schedules/import', [ScheduleController::class, 'import'])->name('schedule.import');
    Route::post('/insertSchedule', [ScheduleController::class, 'insertSchedule'])->name('insertSchedule');
    Route::post('/updateSchedule/{id}', [ScheduleController::class, 'updateSchedule'])->name('updateSchedule');
    Route::get('/deleteSchedule/{id}', [ScheduleController::class, 'deleteSchedule'])->name('deleteSchedule');
});

require __DIR__.'/auth.php';
