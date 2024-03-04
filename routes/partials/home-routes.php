<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/minha-conta', [UserController::class, 'show'])->name('users.account');
    Route::get('/minha-conta/editar', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/minha-conta', [UserController::class, 'update'])->name('users.update');
    Route::delete('/minha-conta', [UserController::class, 'destroy'])->name('users.destroy');
});
