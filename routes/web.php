<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\layoutController;
use App\Http\Controllers\publicController;
use App\Http\Controllers\userController;
use App\Http\Controllers\pemerintahController;
use App\Http\Controllers\admController;
use App\Http\Middleware\login;
use App\Http\Middleware\publik;
use App\Http\Middleware\userr;
use App\Http\Middleware\pemerintah;
use App\Http\Middleware\adm;
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

Route::middleware([publik::class])->group(function () {
    Route::get('/', [publicController::class, 'landing'])->name('landing');
    Route::get('/pusat-bantuan', [publicController::class, 'help'])->name('help');
    Route::get('/login', [publicController::class, 'login'])->name('login');
    Route::post('/login', [publicController::class, 'login_auth'])->name('login-auth');
    Route::get('/register', [publicController::class, 'register'])->name('register');
    Route::post('/register', [publicController::class, 'register_submit'])->name('register-submit');

    //Pemerintah
    Route::get('/pemerintah', [pemerintahController::class, 'login'])->name('pemerintah-login');
    Route::post('/pemerintah-login-auth', [pemerintahController::class, 'login_auth'])->name('pemerintah-login-auth');

    //Adm
    Route::get('/adm', [admController::class, 'login'])->name('adm-login');
    Route::post('/adm-login-auth', [admController::class, 'login_auth'])->name('adm-login-auth');
});

Route::middleware([userr::class])->group(function () {
    Route::get('/dashboard', [userController::class, 'dashboard'])->name('dashboard');
    Route::post('/', [publicController::class, 'logout'])->name('logout');
    Route::get('/{id}/aduan/', [userController::class, 'aduan'])->name('aduan');
    Route::get('/aduan/tambah', [userController::class, 'aduan_tambah'])->name('aduan-tambah');
    Route::post('/aduan/tambah', [userController::class, 'aduan_tambah_submit'])->name('aduan-tambah-submit');
    Route::get('/profil', [userController::class, 'profil'])->name('profil');
    Route::post('/profil-ubah', [userController::class, 'profil_ubah'])->name('profil-ubah');
});

Route::middleware([pemerintah::class])->group(function () {
    Route::get('/pemerintah/dashboard', [pemerintahController::class, 'dashboard'])->name('pemerintah-dashboard');
    Route::post('/pemerintah', [pemerintahController::class, 'logout'])->name('pemerintah-logout');
    Route::get('/pemerintah/{id}/aduan/', [pemerintahController::class, 'aduan'])->name('pemerintah-aduan');
    Route::post('/pemerintah/{id}/balasan', [pemerintahController::class, 'balasan'])->name('pemerintah-balasan');
    Route::post('/pemerintah/{id}/selesai/', [pemerintahController::class, 'selesai'])->name('pemerintah-selesai');
    Route::get('/pemerintah/profil', [pemerintahController::class, 'profil'])->name('pemerintah-profil');
    Route::post('/pemerintah/profil-ubah', [pemerintahController::class, 'profil_ubah'])->name('pemerintah-profil-ubah');
    Route::get('/pemerintah/validasi', [pemerintahController::class, 'validasi'])->name('pemerintah-validasi');
    Route::post('/pemerintah/validasi/{id}/verifikasi', [pemerintahController::class, 'validasi_verifikasi'])->name('pemerintah-validasi-verifikasi');
    Route::post('/pemerintah/validasi/{id}/hapus', [pemerintahController::class, 'validasi_hapus'])->name('pemerintah-validasi-hapus');
    Route::get('/pemerintah/{id}/akun-detail', [pemerintahController::class, 'akun_detail'])->name('pemerintah-akun-detail');
});

Route::middleware([adm::class])->group(function () {
    Route::get('/adm/dashboard', [admController::class, 'dashboard'])->name('adm-dashboard');
    Route::get('/adm/{id}/aduan/', [admController::class, 'aduan'])->name('adm-aduan');
    Route::post('/adm', [admController::class, 'logout'])->name('adm-logout');
    Route::get('/adm/kelola-pemerintah', [admController::class, 'kelola_pemerintah'])->name('adm-kelola-pemerintah');
    Route::get('/adm/{id}/kelola-pemerintah-detail', [admController::class, 'kelola_pemerintah_detail'])->name('adm-kelola-pemerintah-detail');
    Route::get('/adm/register-pemerintah', [admController::class, 'register_pemerintah'])->name('adm-register-pemerintah');
    Route::post('/adm/register-pemerintah', [admController::class, 'register_pemerintah_submit'])->name('adm-register-pemerintah-submit');
    Route::get('/adm/daftar-pengguna', [admController::class, 'daftar_pengguna'])->name('adm-daftar-pengguna');
    Route::get('/adm/{id}/daftar-pengguna', [admController::class, 'daftar_pengguna_detail'])->name('adm-daftar-pengguna-detail');
    Route::get('/adm/kelola-bantuan', [admController::class, 'kelola_bantuan'])->name('adm-kelola-bantuan');
    Route::get('/adm/kelola-bantuan/{id}/detail', [admController::class, 'kelola_bantuan_detail'])->name('adm-kelola-bantuan-detail');
    Route::get('/adm/kelola-bantuan/tambah', [admController::class, 'kelola_bantuan_tambah'])->name('adm-kelola-bantuan-tambah');
    Route::post('/adm/kelola-bantuan/tambah', [admController::class, 'kelola_bantuan_tambah_submit'])->name('adm-kelola-bantuan-tambah-submit');
    Route::get('/adm/kelola-bantuan/{id}/ubah', [admController::class, 'kelola_bantuan_ubah'])->name('adm-kelola-bantuan-ubah');
    Route::post('/adm/kelola-bantuan/{id}/ubah', [admController::class, 'kelola_bantuan_ubah_submit'])->name('adm-kelola-bantuan-ubah-submit');
    Route::post('/adm/kelola-bantuan/{id}/hapus', [admController::class, 'kelola_bantuan_hapus'])->name('adm-kelola-bantuan-hapus');
});



Route::get('/temp/daftar-aduan', [layoutController::class, 'daftar_aduan']);
Route::get('/temp/detail-aduan-pemerintah', [layoutController::class, 'detail_aduan_pemerintah']);
Route::get('/temp/detail-aduan', [layoutController::class, 'detail_aduan']);
Route::get('/temp/registrasi-pemerintah', [layoutController::class, 'registrasi_pemerintah']);
Route::get('/temp/tambah-aduan', [layoutController::class, 'tambah_aduan']);
