<?php

use Illuminate\Support\Facades\Route;

// BERANDA
Route::view('/', 'pages.home')->name('home');

// LOMBA
Route::prefix('lomba')->name('lomba.')->group(function () {
    Route::view('/panduan', 'pages.lomba.panduan')->name('panduan');
    Route::view('/tahapan', 'pages.lomba.tahapan')->name('tahapan');
});

// PENGUMUMAN
Route::prefix('pengumuman')->name('pengumuman.')->group(function () {
    Route::view('/3besar', 'pages.pengumuman.3besar')->name('3besar');
    Route::view('/lolos-seleksi-proposal', 'pages.pengumuman.lolos')->name('lolos');
    
});

// FAQ
Route::view('/faq', 'pages.faq')->name('faq');