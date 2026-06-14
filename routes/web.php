<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\GalleryController;

// =========================================================
// 1. AREA PUBLIK (Tamu) -> kehidupan.majuterus.my.id
// =========================================================
Route::domain('kehidupan.majuterus.my.id')->group(function () {
    
    // Halaman utama / Beranda pengunjung
    Route::get('/', [JournalController::class, 'index']);

});

// =========================================================
// 2. AREA KHUSUS OWNER -> hanif.majuterus.my.id
// =========================================================
Route::domain('hanif.majuterus.my.id')->group(function () {

    // Jika sekadar mengetik hanif.majuterus.my.id, otomatis diarahkan ke login
    Route::get('/', function () {
        return redirect()->route('login');
    });

    // --- AREA PINTU MASUK (Halaman Login Rahasia) ---
    Route::get('/login-owner', [AuthController::class, 'formLogin'])->name('login');
    Route::post('/login-owner', [AuthController::class, 'prosesLogin']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // --- AREA SANG OWNER (Wajib Login) ---
    Route::middleware('auth')->group(function () {
        
        Route::get('/admin/dashboard', [AdminController::class, 'index']);
        
        // Profil
        Route::get('/admin/profil', [AdminController::class, 'editProfil']);
        Route::post('/admin/profil/simpan', [AdminController::class, 'simpanProfil']);
        Route::get('/admin/profil/hapus/{jenis}', [AdminController::class, 'hapusFile']);

        // Projek
        Route::get('/admin/project/tambah', [ProjectController::class, 'create']);
        Route::post('/admin/project/simpan', [ProjectController::class, 'store']);
        Route::get('/admin/project/edit/{id}', [ProjectController::class, 'edit']);
        Route::post('/admin/project/update/{id}', [ProjectController::class, 'update']);
        Route::get('/admin/project/hapus/{id}', [ProjectController::class, 'destroy']);

        // Jurnal
        Route::get('/tulis', [JournalController::class, 'create']);
        Route::post('/simpan', [JournalController::class, 'store']);
        Route::get('/admin/journal/edit/{id}', [JournalController::class, 'edit']);
        Route::post('/admin/journal/update/{id}', [JournalController::class, 'update']);
        Route::get('/admin/journal/hapus/{id}', [JournalController::class, 'destroy']);

        // Galeri (Kini memiliki fitur hapus)
        Route::get('/admin/galeri/tambah', [GalleryController::class, 'create']);
        Route::post('/admin/galeri/simpan', [GalleryController::class, 'store']);
        Route::get('/admin/galeri/hapus/{id}', [GalleryController::class, 'destroy']);
    });

});