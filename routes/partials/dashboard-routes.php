<?php

use App\Http\Controllers\DashboardArtController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardSubscriberController;
use App\Models\Permission;
use Illuminate\Support\Facades\Route;

Route::name('dashboard.')
    ->prefix('painel')
    ->middleware(['auth', 'can:' . Permission::ACCESS_ADMIN_PANEL])
    ->group(function () {
        Route::get('/artes', [DashboardArtController::class, 'index'])->name('arts.index');
        Route::get('/artes/nova', [DashboardArtController::class, 'create'])->name('arts.create');
        Route::post('/artes/nova', [DashboardArtController::class, 'store'])->name('arts.store');
        Route::get('/artes/{art}/editar', [DashboardArtController::class, 'edit'])->name('arts.edit');
        Route::patch('/artes/{art}/editar', [DashboardArtController::class, 'update'])->name('arts.update');

        Route::get('/categorias', [DashboardCategoryController::class, 'index'])->name('categories.index');
        Route::post('/categorias', [DashboardCategoryController::class, 'store'])->name('categories.store');
        Route::patch('/categorias/{category}', [DashboardCategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categorias/{category}', [DashboardCategoryController::class, 'destroy'])->name('categories.destroy');

        Route::get('/assinantes', [DashboardSubscriberController::class, 'index'])->name('subscribers.index');
    });
