<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    // Route::get('login', [AuthenticatedSessionController::class, 'create'])
    //             ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('auth.logout');
});
