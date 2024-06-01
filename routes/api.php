<?php

use App\Constants\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Dosen\ScheduleController as DosenScheduleController;
use App\Http\Controllers\Api\Dosen\PresenceController as DosenPresenceController;

use App\Http\Controllers\Api\Mahasiswa\ScheduleController as MahasiswaScheduleController;
use App\Http\Controllers\Api\Mahasiswa\PresenceController as MahasiswaPresenceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::middleware('auth:api')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('refresh', [AuthController::class, 'refresh'])->name('refresh');

    Route::get('profile', [AuthController::class, 'getMe']);
    Route::put('profile', [AuthController::class, 'update']);

    // Dosen
    Route::group(['middleware' => 'role:'.UserType::DOSEN, 'prefix' => 'dosen'], function () {
        Route::group(['prefix' => 'schedules'], function () {
            Route::get('/', [DosenScheduleController::class, 'index']);
            Route::get('{scheduleSessionId}', [DosenScheduleController::class, 'show']);

            Route::group(['prefix' => '{scheduleSessionId}/presences/{presenceId}', 'controller' => DosenPresenceController::class], function () {
                Route::get('/', 'show');
                Route::post('generate-qr', 'generateQR');
            });
        });
    });

    // Mahasiswa
    Route::group(['middleware' => 'role:'.UserType::MAHASISWA, 'prefix' => 'mahasiswa'], function () {
        Route::group(['prefix' => 'schedules'], function () {
            Route::get('/', [MahasiswaScheduleController::class, 'index']);
            Route::get('{scheduleSessionId}', [MahasiswaScheduleController::class, 'show']);
        });

        Route::post('scan', [MahasiswaPresenceController::class, 'scan']);
        
        Route::group(['prefix' => 'absences'], function () {
            Route::post('store', [ MahasiswaPresenceController::class, 'storeAbsence']);
        });
    });
});
