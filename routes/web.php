<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PublicController,
    AuthController,
    DashboardController,
    ProfileController,
    LogistikController,
    KasController,
    KategoriStokController,
    KegiatanController,
    PengurusController,
    LaporanController
};

/*
|--------------------------------------------------------------------------
| Public Routes (Bisa diakses siapa saja)
|--------------------------------------------------------------------------
*/

// 1. Halaman Front-End Publik (Akses Pertama Kali)
Route::get('/', [PublicController::class, 'index'])->name('landing');

// 2. Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

/*
|--------------------------------------------------------------------------
| Authenticated Routes (Harus Login)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // 1. Dashboard Utama Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // 2. Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 3. Modul Logistik & Stok
    Route::resource('kategori-stok', KategoriStokController::class);
    Route::resource('logistik', LogistikController::class);

    // 4. Modul Keuangan / Kas
    Route::resource('kas', KasController::class);

    // 5. Modul Agenda & Kegiatan
    Route::resource('kegiatan', KegiatanController::class);

    // 6. Modul SDM / Pengurus
    Route::resource('pengurus', PengurusController::class);

    // 7. Modul Laporan
    Route::get('/laporan/cetak', [LaporanController::class, 'cetak'])->name('laporan.cetak');

    // 8. Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
