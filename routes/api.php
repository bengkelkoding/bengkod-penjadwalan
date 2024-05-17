<?php

use App\Constants\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

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
    Route::group(['middleware' => 'role:'.UserType::DOSEN, 'prefix' => 'dosen'], function () {
        Route::get('/dosen', function () {
            return response()->json(['role' => 'dokter']);
        });
    });

    Route::middleware('role:'.UserType::MAHASISWA)->group(function () {
        Route::get('/mahasiswa', function () {
            return response()->json(['role' => 'mahasiswa']);
        });
    });  

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('refresh', [AuthController::class, 'refresh'])->name('refresh');

    Route::get('profile', [AuthController::class, 'getMe']);
    Route::put('profile', [AuthController::class, 'update']);
});
