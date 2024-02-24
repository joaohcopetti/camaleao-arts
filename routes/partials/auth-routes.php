<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::name('auth.')->middleware('guest')->group(function () {
    Route::get('/entrar', [AuthenticatedSessionController::class, 'create'])->name('create');
    Route::post('/entrar', [AuthenticatedSessionController::class, 'store'])->name('store');
});
