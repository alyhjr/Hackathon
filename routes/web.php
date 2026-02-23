<?php

use Illuminate\Support\Facades\Route;

// HOME
Route::view('/', 'pages.home')->name('home');

// LOMBA (dropdown)
Route::view('/lomba/panduan', 'pages.lomba_panduan')->name('lomba.panduan');
Route::view('/lomba/tahapan', 'pages.lomba_tahapan')->name('lomba.tahapan');

// PENGUMUMAN (dropdown)
Route::view('/pengumuman/3besar', 'pages.pengumuman_3besar')->name('pengumuman.3besar');
Route::view('/pengumuman/lolos', 'pages.pengumuman_lolos')->name('pengumuman.lolos');

// FAQ
Route::view('/faq', 'pages.faq')->name('faq');