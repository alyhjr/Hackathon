<?php

use Illuminate\Support\Facades\Route;

// BERANDA
Route::view('/', 'pages.home')->name('home');

Route::view('/lomba/panduan', 'pages.lomba_panduan')->name('lomba.panduan');
Route::view('/lomba/tahapan', 'pages.lomba_tahapan')->name('lomba.tahapan');

Route::view('/pengumuman/3besar', 'pages.pengumuman_3besar')->name('pengumuman.3besar');
Route::view('/pengumuman/lolos', 'pages.pengumuman_lolos')->name('pengumuman.lolos');

Route::view('/faq', 'pages.faq')->name('faq');