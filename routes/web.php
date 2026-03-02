<?php

use Illuminate\Support\Facades\Route;

// BERANDA
Route::view('/', 'pages.home')->name('home');

// LOMBA
Route::prefix('lomba')->name('lomba.')->group(function () {
    Route::view('/ketentuan', 'pages.lomba.ketentuan')->name('ketentuan'); // ✅ balik lagi
    Route::view('/tahapan', 'pages.lomba.tahapan')->name('tahapan');
});

// PENGUMUMAN
Route::prefix('pengumuman')->name('pengumuman.')->group(function () {
    Route::view('/3besar', 'pages.pengumuman.3besar')->name('3besar');
    Route::view('/lolos-seleksi-proposal', 'pages.pengumuman.lolos')->name('lolos');
});

// FAQ
Route::view('/faq', 'pages.faq')->name('faq');

// DAPODIK  
use App\Http\Controllers\RegistrasiController;

Route::get('/registrasi', [RegistrasiController::class, 'index'])->name('registrasi');
Route::post('/registrasi/cek', [RegistrasiController::class, 'cek'])->name('registrasi.cek');
Route::post('/registrasi/simpan', [RegistrasiController::class, 'simpan'])->name('registrasi.simpan');