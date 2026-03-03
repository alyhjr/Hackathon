<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| BERANDA
|--------------------------------------------------------------------------
*/
Route::view('/', 'pages.home')->name('home');


/*
|--------------------------------------------------------------------------
| LOMBA (Dropdown Menu)
|--------------------------------------------------------------------------
| URL:
| /lomba/panduan
| /lomba/tahapan
| /lomba/ketentuan
|--------------------------------------------------------------------------
*/
Route::prefix('lomba')->name('lomba.')->group(function () {

    Route::view('/panduan', 'pages.lomba.panduan')
        ->name('panduan');

    Route::view('/tahapan', 'pages.lomba.tahapan')
        ->name('tahapan');

    Route::view('/ketentuan', 'pages.lomba.ketentuan')
        ->name('ketentuan');
});


/*
|--------------------------------------------------------------------------
| PENGUMUMAN (Dropdown Menu)
|--------------------------------------------------------------------------
| URL:
| /pengumuman/3besar
| /pengumuman/lolos-seleksi-proposal
|--------------------------------------------------------------------------
*/
Route::prefix('pengumuman')->name('pengumuman.')->group(function () {

    Route::view('/3besar', 'pages.pengumuman.3besar')
        ->name('3besar');

    Route::view('/lolos-seleksi-proposal', 'pages.pengumuman.lolos')
        ->name('lolos');
});


/*
|--------------------------------------------------------------------------
| FAQ
|--------------------------------------------------------------------------
*/
Route::view('/faq', 'pages.faq')->name('faq');


/*
|--------------------------------------------------------------------------
| REGISTRASI (Kalau tombol Registrasi di Home pakai route ini)
|--------------------------------------------------------------------------
*/
Route::view('/registrasi', 'pages.registrasi')->name('registrasi');