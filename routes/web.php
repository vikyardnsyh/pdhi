<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\Administrator\AdminAkunController;
use App\Http\Controllers\Administrator\AdminDokterController;
use App\Http\Controllers\Administrator\AdminKeanggotaanController;
use App\Http\Controllers\Administrator\AdminBerkasController;
use App\Http\Controllers\Dokter\uploadBerkasController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PenggunaController;


// Auth
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/login', [LoginController::class, 'login']);

// Beranda (Dokter / User)
Route::get('/', [BerandaController::class, 'index'])->name('home')->middleware('autentikasi');

// Administrator
// Data Akun
Route::resource('/AdminAkun', AdminAkunController::class);
// Data Dokter
Route::resource('/adminDokter', adminDokterController::class);
// Data Berkas
Route::resource('/adminBerkas', adminBerkasController::class);


// User
// Upload Berkas
Route::resource('/uploadBerkas', uploadBerkasController::class);


//lokasi regsister : C:\laragon\www\pdhi-banten\app\Http\Controllers\Auth\RegisterController.php
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

Route::resource('/pengguna', PenggunaController::class);

Route::resource('/dokter', DokterController::class);
Route::resource('/dokter-tambah', DokterController::class)->middleware('autentikasi:2');

