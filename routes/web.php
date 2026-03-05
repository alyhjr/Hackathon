<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\SiteSettingController;

// ✅ Tambahan untuk tarik data DB Lomba (ketentuan & tahapan)
use App\Models\LombaKetentuanItem;
use App\Models\LombaTahapanStep;

/*
BERANDA
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

/* LOMBA (Dropdown Menu) */
Route::prefix('lomba')->name('lomba.')->group(function () {

    // tetap view (statis)
    Route::view('/panduan', 'pages.lomba.panduan')->name('panduan');

    // ✅ Tahapan: pakai Route::get supaya bisa compact('steps')
    Route::get('/tahapan', function () {
        $steps = LombaTahapanStep::where('is_active', 1)
            ->orderBy('step_number')
            ->orderBy('sort_order')
            ->get();

        return view('pages.lomba.tahapan', compact('steps'));
    })->name('tahapan');

    // ✅ Ketentuan: pakai Route::get supaya bisa compact kategori/persyaratan/pendaftaran
    Route::get('/ketentuan', function () {
        $kategori = LombaKetentuanItem::where('tab', 'kategori')
            ->where('is_active', 1)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $persyaratan = LombaKetentuanItem::where('tab', 'persyaratan')
            ->where('is_active', 1)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $pendaftaran = LombaKetentuanItem::where('tab', 'pendaftaran')
            ->where('is_active', 1)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('pages.lomba.ketentuan', compact('kategori', 'persyaratan', 'pendaftaran'));
    })->name('ketentuan');
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
|--------------------------------------------------------------------------
| ADMIN - Site Settings (CMS)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    // CMS utama
    Route::get('/site-settings', [SiteSettingController::class, 'edit'])
        ->name('site-settings.edit');

    Route::put('/site-settings', [SiteSettingController::class, 'update'])
        ->name('site-settings.update');

    // =====================
    // FAQ CRUD
    // =====================
    Route::post('/site-settings/faqs', [SiteSettingController::class, 'faqStore'])
        ->name('site-settings.faqs.store');

    Route::put('/site-settings/faqs/{faq}', [SiteSettingController::class, 'faqUpdate'])
        ->name('site-settings.faqs.update');

    Route::delete('/site-settings/faqs/{faq}', [SiteSettingController::class, 'faqDestroy'])
        ->name('site-settings.faqs.destroy');

    // =====================
    // LOMBA CRUD
    // =====================

    // Ketentuan
    Route::post('/site-settings/lomba/ketentuan', [SiteSettingController::class, 'lombaKetentuanStore'])
        ->name('site-settings.lomba.ketentuan.store');

    Route::put('/site-settings/lomba/ketentuan/{item}', [SiteSettingController::class, 'lombaKetentuanUpdate'])
        ->name('site-settings.lomba.ketentuan.update');

    Route::delete('/site-settings/lomba/ketentuan/{item}', [SiteSettingController::class, 'lombaKetentuanDestroy'])
        ->name('site-settings.lomba.ketentuan.destroy');

    // Tahapan
    Route::post('/site-settings/lomba/tahapan', [SiteSettingController::class, 'lombaTahapanStore'])
        ->name('site-settings.lomba.tahapan.store');

    Route::put('/site-settings/lomba/tahapan/{step}', [SiteSettingController::class, 'lombaTahapanUpdate'])
        ->name('site-settings.lomba.tahapan.update');

    Route::delete('/site-settings/lomba/tahapan/{step}', [SiteSettingController::class, 'lombaTahapanDestroy'])
        ->name('site-settings.lomba.tahapan.destroy');
});