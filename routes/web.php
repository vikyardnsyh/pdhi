<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
//General
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;
//Admin
use App\Http\Controllers\Administrator\AdminAkunController;
use App\Http\Controllers\Administrator\AdminDokterController;
use App\Http\Controllers\Administrator\AdminKeanggotaanController;
use App\Http\Controllers\Administrator\AdminBerkasController;
//User
use App\Http\Controllers\Dokter\formRegistrasiController;
use App\Http\Controllers\Dokter\uploadBerkasController;
use App\Http\Controllers\Dokter\syaratPendaftaranController;


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
// Form Registrasi
Route::resource('/formRegistrasi', formRegistrasiController::class);
// Upload Berkas
Route::get('/uploadBerkas/download', [uploadBerkasController::class, 'download']);
Route::resource('/uploadBerkas', uploadBerkasController::class);
// Route::get('/uploadBerkas/download',['as'=>'uploadBerkas.download','uses'=>'@download']);
// Syarat Pendaftaran
Route::resource('/syaratPendaftaran', syaratPendaftaranController::class);



//lokasi regsister : C:\laragon\www\pdhi-banten\app\Http\Controllers\Auth\RegisterController.php
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

Route::resource('/pengguna', PenggunaController::class);

Route::resource('/dokter', DokterController::class);
Route::resource('/dokter-tambah', DokterController::class)->middleware('autentikasi:2');

