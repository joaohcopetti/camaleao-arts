<?php

use App\Http\Controllers\ArtController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardArtController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('home');

Route::name('auth.')->middleware('guest')->group(function () {
    Route::get('/entrar', [AuthenticatedSessionController::class, 'create'])->name('create');
    Route::post('/entrar', [AuthenticatedSessionController::class, 'store'])->name('store');
});

Route::name('images.')->group(function () {
    Route::get('/imagens/{art}/download', [ArtController::class, 'downloadArt'])
        ->name('download');

    Route::get('/imagens/{art}/download-project', [ArtController::class, 'downloadProject'])
        ->name('download-project');

    Route::get('/imagens/{filepath}', [ArtController::class, 'getArt'])
        ->where('filepath', '.*')
        ->name('get');

});

Route::name('dashboard.')
    ->prefix('painel')
    ->middleware(['auth', 'can:access_admin_panel'])
    ->group(function () {
        Route::get('/artes', [DashboardArtController::class, 'index'])->name('arts.index');
        Route::get('/artes/nova', [DashboardArtController::class, 'create'])->name('arts.create');
        Route::post('/artes/nova', [DashboardArtController::class, 'store'])->name('arts.store');
    });
// Route::get('/artes', --)->name('arts.index');
// Route::get('categorias/{category}')->name('categories.show');
