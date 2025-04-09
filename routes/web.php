<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SuratAktifController;

Route::get('/', function () {
    return view('welcome');
});

// Login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

// Register
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// ForgotPassword
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');


// Dashboard utama (semua user setelah login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Dashboard Mahasiswa
Route::get('/mahasiswa/dashboard', function () {
    return view('dashboard.mahasiswa');
})->name('mahasiswa.dashboard');

// Dashboard Kaprodi
Route::get('/kaprodi/dashboard', function () {
    return view('dashboard.kaprodi');
})->name('kaprodi.dashboard');

// Dashboard Admin
Route::get('/admin/dashboard', function () {
    return view('dashboard.admin');
})->name('admin.dashboard');

// Dashboard SuperAdmin
Route::get('/superadmin/dashboard', function () {
    return view('dashboard.superadmin');
})->name('superadmin.dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/mahasiswa/surat/aktif', [SuratAktifController::class, 'create'])->name('surat.aktif.create');
    Route::post('/mahasiswa/surat/aktif', [SuratAktifController::class, 'store'])->name('surat.aktif.store');

    // Surat Hasil Studi
    Route::get('/mahasiswa/surat/hasil', function () {
        return view('dashboard.surat_mahasiswa.hasil');
    })->name('surat.hasil');

    // Surat Keterangan
    Route::get('/mahasiswa/surat/keterangan', function () {
        return view('dashboard.surat_mahasiswa.keterangan');
    })->name('surat.keterangan');

    // Surat Pengantar
    Route::get('/mahasiswa/surat/pengantar', function () {
        return view('dashboard.surat_mahasiswa.pengantar');
    })->name('surat.pengantar');

    // Surat Rekomendasi
    Route::get('/mahasiswa/surat/rekomendasi', function () {
        return view('dashboard.surat_mahasiswa.rekomendasi');
    })->name('surat.rekomendasi');

    // Surat Laporan
    Route::get('/mahasiswa/surat/laporan', function () {
        return view('dashboard.surat_mahasiswa.hasil');
    })->name('surat.laporan');
});
