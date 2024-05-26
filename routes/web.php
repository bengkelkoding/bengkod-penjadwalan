<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\AbsentController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\MahasiswaController;
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
    
    Route::group(['prefix' => 'settings', 'as' => 'setting.', 'controller' => SettingController::class], function () {
        Route::get('/', 'index')->name('index');
        Route::put('/update', 'update')->name('update');
    });

    Route::group(['prefix' => 'classrooms', 'as' => 'classroom.', 'controller' => ClassroomController::class], function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });

    Route::group(['prefix' => 'dosen', 'as' => 'dosen.', 'controller' => DosenController::class], function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });

    Route::group(['prefix' => 'mahasiswa', 'as' => 'mahasiswa.', 'controller' => MahasiswaController::class], function () {
        Route::get('/', 'index')->name('index');
        Route::post('/import', 'import')->name('import');
        Route::post('/store', 'store')->name('store');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });

    Route::get('/absent', [AbsentController::class, 'index'])->name('absent.index');
    Route::get('/absent/absentRequest', [AbsentController::class, 'absentRequest'])->name('absentRequest');

    Route::group(['prefix' => 'schedules', 'as' => 'schedule.', 'controller' => ScheduleController::class], function () {
        Route::get('/', 'index')->name('index');
        Route::post('/import', 'import')->name('import');
        Route::post('/insertSchedule', 'insertSchedule')->name('store');
        Route::post('/updateSchedule/{id}', 'updateSchedule')->name('update');
        Route::get('/deleteSchedule/{id}', 'deleteSchedule')->name('destroy');
    });
});
