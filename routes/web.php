<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\SiteSettingController;

/*
BERANDA
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

/* LOMBA (Dropdown Menu */
Route::prefix('lomba')->name('lomba.')->group(function () {
    Route::view('/panduan', 'pages.lomba.panduan')->name('panduan');
    Route::view('/tahapan', 'pages.lomba.tahapan')->name('tahapan');
    Route::view('/ketentuan', 'pages.lomba.ketentuan')->name('ketentuan');
});

/* PENGUMUMAN (Dropdown Menu) */
Route::prefix('pengumuman')->name('pengumuman.')->group(function () {
    Route::view('/3besar', 'pages.pengumuman.3besar')->name('3besar');
    Route::view('/lolos-seleksi-proposal', 'pages.pengumuman.lolos')->name('lolos');
});

/*
FAQ
*/
Route::view('/faq', 'pages.faq')->name('faq');

/*
REGISTRASI
*/
Route::view('/registrasi', 'pages.registrasi')->name('registrasi');


/*
ADMIN - Site Settings (CMS)
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/site-settings', [SiteSettingController::class, 'edit'])->name('site-settings.edit');
    Route::put('/site-settings', [SiteSettingController::class, 'update'])->name('site-settings.update');
});