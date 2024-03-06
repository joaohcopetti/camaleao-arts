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
        Route::delete('/artes/{art}', [DashboardArtController::class, 'delete'])->name('arts.delete');

        Route::get('/categorias', [DashboardCategoryController::class, 'index'])->name('categories.index');
        Route::post('/categorias', [DashboardCategoryController::class, 'store'])->name('categories.store');
        Route::patch('/categorias/{category}', [DashboardCategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categorias/{category}', [DashboardCategoryController::class, 'destroy'])->name('categories.destroy');

        Route::get('/assinantes', [DashboardSubscriberController::class, 'index'])->name('subscribers.index');
        Route::get('/assinantes/novo', [DashboardSubscriberController::class, 'create'])->name('subscribers.create');
        Route::post('/assinantes/novo', [DashboardSubscriberController::class, 'store'])->name('subscribers.store');
        Route::get('/assinantes/{user}/editar', [DashboardSubscriberController::class, 'edit'])->name('subscribers.edit');
        Route::patch('/assinantes/{user}/editar', [DashboardSubscriberController::class, 'patch'])->name('subscribers.update');
    });
