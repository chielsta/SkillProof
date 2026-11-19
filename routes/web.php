<?php

use App\Http\Controllers\AnalisisLowonganController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\SkillSayaController;
use Illuminate\Support\Facades\Route;

// Halaman Awal / Landing
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
})->name('home');

// Autentikasi (Tamu)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

// Portofolio Publik (Bisa diakses siapapun tanpa login)
Route::get('/p/{username}', [PortofolioController::class, 'publicView'])->name('portofolio.public');

// Fitur Aplikasi Terproteksi (Wajib Login)
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Analisis Lowongan
    Route::resource('analisis-lowongan', AnalisisLowonganController::class)->except(['edit', 'update']);

    // Pemetaan Bukti Skill (Skill Saya)
    Route::get('/skill-saya', [SkillSayaController::class, 'index'])->name('skill-saya.index');
    Route::post('/skill-saya/link', [SkillSayaController::class, 'linkProject'])->name('skill-saya.link');

    // Pengelolaan Proyek
    Route::resource('proyek', ProyekController::class);

    // Rekomendasi Proyek
    Route::get('/rekomendasi', [RekomendasiController::class, 'index'])->name('rekomendasi.index');

    // Portofolio Pengguna
    Route::get('/portofolio', [PortofolioController::class, 'index'])->name('portofolio.index');
    Route::post('/portofolio/add', [PortofolioController::class, 'addProject'])->name('portofolio.add');
    Route::delete('/portofolio/remove/{project_id}', [PortofolioController::class, 'removeProject'])->name('portofolio.remove');

    // Pengaturan & Profil
    Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan.index');
    Route::put('/pengaturan/profile', [PengaturanController::class, 'updateProfile'])->name('pengaturan.profile');
    Route::put('/pengaturan/password', [PengaturanController::class, 'updatePassword'])->name('pengaturan.password');
});
