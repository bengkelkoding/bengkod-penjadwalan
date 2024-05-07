<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AbsentController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ClassroomController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return redirect()->route('auth.index');
});

Route::middleware('guest:web')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'index'])->name('auth.index');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('auth.login');
    
});

Route::middleware('auth:web')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('auth.logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'classrooms', 'name' => 'classroom.', 'controller' => ClassroomController::class], function() {
        Route::get('/', 'index')->name('classroom.index');
        Route::post('/store', 'store')->name('classroom.store');
        Route::put('/{id}/update', 'update')->name('classroom.update');
        Route::delete('/{id}/destroy', 'destroy')->name('classroom.destroy');
    });

    Route::get('/absent', [AbsentController::class, 'index'])->name('absent.index');

    Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedule.index');
    Route::post('/schedules/import', [ScheduleController::class, 'import'])->name('schedule.import');
    Route::post('/insertSchedule', [ScheduleController::class, 'insertSchedule'])->name('insertSchedule');
    Route::post('/updateSchedule/{id}', [ScheduleController::class, 'updateSchedule'])->name('updateSchedule');
    Route::get('/deleteSchedule/{id}', [ScheduleController::class, 'deleteSchedule'])->name('deleteSchedule');

    Route::get('/mahasiswa', function () {
        return view('student.index');
    });
});