<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\SentraController;
use App\Http\Controllers\Admin\PembayaranController as AdminPembayaranController;
use App\Http\Controllers\Admin\KritikSaranController as AdminKritikSaranController;
use App\Http\Controllers\Guru\DashboardController as GuruDashboardController;
use App\Http\Controllers\Guru\JadwalController;
use App\Http\Controllers\Guru\NilaiController;
use App\Http\Controllers\Guru\KelasController as GuruKelasController;
use App\Http\Controllers\Orangtua\DashboardController as OrangtuaDashboardController;
use App\Http\Controllers\Orangtua\JadwalController as OrangtuaJadwalController;
use App\Http\Controllers\Orangtua\NilaiController as OrangtuaNilaiController;
use App\Http\Controllers\Orangtua\PembayaranController as OrangtuaPembayaranController;
use App\Http\Controllers\Orangtua\KritikSaranController as OrangtuaKritikSaranController;

// Halaman Utama
Route::get('/', function () {
    return view('welcome');
});
// tentang kami
Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');


// Autentikasi
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes untuk Admin
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('sentra', SentraController::class);
    
    // Pembayaran
    Route::get('/pembayaran', [AdminPembayaranController::class, 'index'])->name('pembayaran.index');
    Route::get('/pembayaran/{pembayaran}', [AdminPembayaranController::class, 'show'])->name('pembayaran.show');
    Route::put('/pembayaran/{pembayaran}/status', [AdminPembayaranController::class, 'updateStatus'])->name('pembayaran.updateStatus');
    
    // Kritik dan Saran
    Route::get('/kritik-saran', [AdminKritikSaranController::class, 'index'])->name('kritik-saran.index');
    Route::get('/kritik-saran/{kritikSaran}', [AdminKritikSaranController::class, 'show'])->name('kritik-saran.show');
    Route::delete('/kritik-saran/{kritikSaran}', [AdminKritikSaranController::class, 'destroy'])->name('kritik-saran.destroy');
});

// Routes untuk Guru
Route::prefix('guru')->name('guru.')->middleware(['auth', 'role:guru'])->group(function () {
    Route::get('/dashboard', [GuruDashboardController::class, 'index'])->name('dashboard');
    
    // Jadwal
    Route::resource('jadwal', JadwalController::class);
    
    // Nilai
    Route::resource('nilai', NilaiController::class);
    
    // Kelas
    Route::get('/kelas', [GuruKelasController::class, 'index'])->name('kelas.index');
    Route::get('/kelas/{kelas}', [GuruKelasController::class, 'show'])->name('kelas.show');
});

// Routes untuk Orangtua
Route::prefix('orangtua')->name('orangtua.')->middleware(['auth', 'role:orangtua'])->group(function () {
    Route::get('/dashboard', [OrangtuaDashboardController::class, 'index'])->name('dashboard');
    
    // Jadwal
    Route::get('/jadwal', [OrangtuaJadwalController::class, 'index'])->name('jadwal.index');
    
    // Nilai
    Route::get('/nilai', [OrangtuaNilaiController::class, 'index'])->name('nilai.index');
    Route::get('/nilai/{nilai}', [OrangtuaNilaiController::class, 'show'])->name('nilai.show');
    
    // Pembayaran
    Route::get('/pembayaran', [OrangtuaPembayaranController::class, 'index'])->name('pembayaran.index');
    Route::get('/pembayaran/create', [OrangtuaPembayaranController::class, 'create'])->name('pembayaran.create');
    Route::post('/pembayaran', [OrangtuaPembayaranController::class, 'store'])->name('pembayaran.store');
    Route::get('/pembayaran/{pembayaran}', [OrangtuaPembayaranController::class, 'show'])->name('pembayaran.show');
    
    // Kritik dan Saran
    Route::get('/kritik-saran', [OrangtuaKritikSaranController::class, 'index'])->name('kritik-saran.index');
    Route::get('/kritik-saran/create', [OrangtuaKritikSaranController::class, 'create'])->name('kritik-saran.create');
    Route::post('/kritik-saran', [OrangtuaKritikSaranController::class, 'store'])->name('kritik-saran.store');
    Route::get('/kritik-saran/{kritikSaran}', [OrangtuaKritikSaranController::class, 'show'])->name('kritik-saran.show');
});
