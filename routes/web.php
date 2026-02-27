<?php

use Illuminate\Support\Facades\Route;



// ================= HOME =================
Route::view('/', 'pages.home')->name('home');


// ================= LOMBA =================
Route::prefix('lomba')->name('lomba.')->group(function () {

    Route::view('/panduan', 'pages.lomba.panduan')->name('panduan');

    Route::view('/ketentuan', 'pages.lomba.ketentuan')->name('ketentuan');

    Route::view('/tahapan', 'pages.lomba.tahapan')->name('tahapan');
});


// ================= PENGUMUMAN =================
Route::prefix('pengumuman')->name('pengumuman.')->group(function () {

    Route::view('/3besar', 'pages.pengumuman.3besar')->name('3besar');

    // Dua URL biar aman (lama & baru tetap jalan)
    Route::view('/lolos', 'pages.pengumuman.lolos')->name('lolos');
    Route::view('/lolos-seleksi-proposal', 'pages.pengumuman.lolos');
});


// ================= FAQ =================
Route::view('/faq', 'pages.faq')->name('faq');


// ================= PING (cek server) =================
Route::get('/ping', function () {
    return 'OK PING AALIYAH';
});