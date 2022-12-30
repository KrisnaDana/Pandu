<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\layoutController;
use App\Http\Controllers\publicController;

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

Route::get('/layout', [layoutController::class, 'layoutLogin']);

Route::prefix('')->group(function () {
    Route::get('/', [publicController::class, 'landing'])->name('landing');
    Route::get('/pusat-bantuan', [publicController::class, 'help'])->name('help');
    Route::get('/login', [publicController::class, 'login'])->name('login');
    Route::get('/aduan', [publicController::class, 'aduan'])->name('aduan');
    Route::get('/new-aduan', [publicController::class, 'newAduan'])->name('new-aduan');
    Route::get('/detail-aduan', [publicController::class, 'detailAduan'])->name('detail-aduan');
    Route::get('/detail-aduan-pemerintah', [publicController::class, 'detailAduanPemerintah'])->name('detail-aduan-pemerintah');
    Route::get('/registrasi-pemerintah', [publicController::class, 'registrasiPemerintah'])->name('registrasi-pemerintah');
});

Route::prefix('perangkat-daerah')->group(function () {
});

Route::prefix('admin')->group(function () {
});
