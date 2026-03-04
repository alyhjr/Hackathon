<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// BERANDA
Route::view('/', 'pages.home')->name('home');

// LOMBA
Route::prefix('lomba')->name('lomba.')->group(function () {
    Route::view('/panduan', 'pages.lomba.panduan')->name('panduan');
    Route::view('/tahapan', 'pages.lomba.tahapan')->name('tahapan');
    Route::view('/ketentuan', 'pages.lomba.ketentuan')->name('ketentuan');
});

// PENGUMUMAN
Route::prefix('pengumuman')->name('pengumuman.')->group(function () {
    Route::view('/3besar', 'pages.pengumuman.3besar')->name('3besar');
    Route::view('/lolos-seleksi-proposal', 'pages.pengumuman.lolos')->name('lolos');
    
});

// FAQ
Route::view('/faq', 'pages.faq')->name('faq');

// AUTH (dari Breeze)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';