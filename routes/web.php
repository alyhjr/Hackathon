<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home');
Route::view('/lomba', 'pages.lomba');
Route::view('/pengumuman', 'pages.pengumuman');
Route::view('/faq', 'pages.faq');