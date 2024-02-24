<?php

use App\Http\Controllers\ArtController;
use App\Models\Permission;
use Illuminate\Support\Facades\Route;

Route::name('arts.')
    ->prefix('/artes')
    ->middleware('can:' . Permission::ACCESS_ARTS)
    ->group(function () {
        Route::get('/', [ArtController::class, 'index'])->name('index');
        Route::get('/imagens/{filename}', [ArtController::class, 'getImage'])->name('image');

        Route::get('/{art}/download-file', [ArtController::class, 'downloadFile'])->name('file-download');
        Route::get('/{art}/download-image', [ArtController::class, 'downloadImage'])->name('image-download');
    });
