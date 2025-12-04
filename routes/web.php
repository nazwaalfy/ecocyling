<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SampahController;
use App\Http\Controllers\Admin\BebanController;
use App\Http\Controllers\Admin\DashboardController;

// Halaman utama
Route::get('/', fn() => view('welcome'));

// Semua route admin
Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    // Input & List Data Sampah
    Route::get('/sampah', [SampahController::class,'index'])->name('sampah.input'); // halaman input sampah
    Route::post('/sampah', [SampahController::class,'store'])->name('sampah.store'); // aksi simpan
    Route::get('/sampah/list', [SampahController::class,'list'])->name('sampah.list'); // lihat semua sampah

    // Input & List Beban
    Route::get('/beban/input', [BebanController::class,'input'])->name('beban.input'); // halaman input beban
    Route::post('/beban/input', [BebanController::class,'store'])->name('beban.store'); // aksi simpan beban
    Route::get('/beban/list', [BebanController::class,'list'])->name('beban.list'); // lihat semua beban

    // Laporan Laba Rugi
    Route::get('/laporan/labarugi', [SampahController::class,'laporanLabaRugi'])->name('laparugi'); // laporan laba rugi

    // Reward & Poin Warga
    Route::get('/reward', [SampahController::class,'rewardPoin'])->name('reward'); // halaman reward & poin warga
});
