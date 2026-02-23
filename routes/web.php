Route::view('/', 'pages.home')->name('home');

Route::view('/lomba/panduan', 'pages.lomba.panduan')->name('lomba.panduan');
Route::view('/lomba/tahapan', 'pages.lomba.tahapan')->name('lomba.tahapan');

Route::view('/pengumuman/3besar', 'pages.pengumuman.3besar')->name('pengumuman.3besar');
Route::view('/pengumuman/lolos', 'pages.pengumuman.lolos')->name('pengumuman.lolos');