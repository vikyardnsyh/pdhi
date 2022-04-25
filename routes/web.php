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
use App\Http\Controllers\Administrator\adminPendaftaranController;
//User
use App\Http\Controllers\Dokter\formRegistrasiController;
use App\Http\Controllers\Dokter\uploadBerkasController;
use App\Http\Controllers\Dokter\syaratPendaftaranController;


// Auth
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/login', [LoginController::class, 'login']);

// Beranda (General)
Route::get('/', [BerandaController::class, 'index'])->name('home')->middleware('autentikasi');
// Pengajuan Akun (General)
Route::get('/pengajuanAkun', function(){return view('auth.pengajuanAkun');})->name('pengajuanAkun');

// #Admin
// Admin Pendaftaran
Route::resource('/AdminAkun', AdminAkunController::class)->middleware('autentikasi:2');
// Admin Dokter
Route::resource('/adminDokter', adminDokterController::class)->middleware('autentikasi:2');
// Admin Pendaftaran
Route::get('/adminPendaftaran/download', [adminPendaftaranController::class, 'download'])->middleware('autentikasi:2');
Route::resource('/adminPendaftaran', adminPendaftaranController::class)->middleware('autentikasi:2');
// Admin Keanggotaan
Route::resource('/adminKeanggotaan', adminKeanggotaanController::class)->middleware('autentikasi:2');

// #User
// Form Registrasi
Route::resource('/formRegistrasi', formRegistrasiController::class)->middleware('autentikasi:1');
// Upload Berkas
Route::get('/uploadBerkas/download', [uploadBerkasController::class, 'download'])->middleware('autentikasi:1');
Route::resource('/uploadBerkas', uploadBerkasController::class)->middleware('autentikasi:1');
// Syarat Pendaftaran
Route::resource('/syaratPendaftaran', syaratPendaftaranController::class)->middleware('autentikasi:1');

//lokasi regsister : C:\laragon\www\pdhi-banten\app\Http\Controllers\Auth\RegisterController.php
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

Route::resource('/pengguna', PenggunaController::class);

Route::resource('/dokter', DokterController::class);
Route::resource('/dokter-tambah', DokterController::class)->middleware('autentikasi:2');

