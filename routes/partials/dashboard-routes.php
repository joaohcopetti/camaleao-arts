<?php

use App\Http\Controllers\DashboardArtController;
use App\Models\Permission;
use Illuminate\Support\Facades\Route;

Route::name('dashboard.')
    ->prefix('painel')
    ->middleware(['auth', 'can:' . Permission::ACCESS_ADMIN_PANEL])
    ->group(function () {
        Route::get('/artes', [DashboardArtController::class, 'index'])->name('arts.index');
        Route::get('/artes/nova', [DashboardArtController::class, 'create'])->name('arts.create');
        Route::post('/artes/nova', [DashboardArtController::class, 'store'])->name('arts.store');
    });
