<?php

use App\Http\Controllers\CategoryController;
use App\Models\Permission;
use Illuminate\Support\Facades\Route;

Route::name('categories.')
    ->prefix('categorias')
    ->middleware(['auth', 'can:' . Permission::ACCESS_ARTS])
    ->group(function () {
        Route::get('/{category}', [CategoryController::class, 'show'])->name('show');
    });
