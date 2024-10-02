<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PklController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
    Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create');
    Route::post('/guru', [GuruController::class, 'store'])->name('guru.store');
    Route::get('/guru/{id_guru}/edit', [GuruController::class, 'edit'])->name('guru.edit');
    Route::match(['put', 'patch'], '/guru/{id_guru}', [GuruController::class, 'update'])->name('guru.update');
    Route::delete('/guru/{id_guru}', [GuruController::class, 'destroy'])->name('guru.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/instansi', [InstansiController::class, 'index'])->name('instansi.index');
    Route::get('/instansi/create', [InstansiController::class, 'create'])->name('instansi.create');
    Route::post('/instansi', [InstansiController::class, 'store'])->name('instansi.store');
    Route::get('/instansi/{id_instansi}/edit', [InstansiController::class, 'edit'])->name('instansi.edit');
    Route::match(['put', 'patch'], '/instansi/{id_instansi}', [InstansiController::class, 'update'])->name('instansi.update');
    Route::delete('/instansi/{id_instansi}', [InstansiController::class, 'destroy'])->name('instansi.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/siswa/{id_siswa}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::match(['put', 'patch'], '/siswa/{id_siswa}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/{id_siswa}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/presensi', [PresensiController::class, 'index'])->name('presensi.index');
    Route::get('/presensi/create', [PresensiController::class, 'create'])->name('presensi.create');
    Route::post('/presensi', [PresensiController::class, 'store'])->name('presensi.store');
    Route::get('/presensi/komponen/rekap/{id}', [PresensiController::class, 'rekap'])->name('presensi.komponen.rekap');
    Route::get('/presensi/komponen/print/{id_siswa}', [PresensiController::class, 'print'])->name('presensi.komponen.print');
});

Route::middleware('auth')->group(function () {
    Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan.index');
    Route::get('/pengajuan/create', [PengajuanController::class, 'create'])->name('pengajuan.create');
    Route::post('/pengajuan', [PengajuanController::class, 'store'])->name('pengajuan.store');
    Route::patch('/pengajuan/{id}/verifikasi', [PengajuanController::class, 'verify'])->name('pengajuan.verify');
    Route::patch('/pengajuan/{id}/unverifikasi', [PengajuanController::class, 'unverify'])->name('pengajuan.unverify');
    Route::delete('/pengajuan/{id_pengajuan}', [PengajuanController::class, 'destroy'])->name('pengajuan.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/pkl', [PklController::class, 'index'])->name('pkl.index');
    Route::get('/pkl/create', [PklController::class, 'create'])->name('pkl.create');
    Route::post('/pkl', [PklController::class, 'store'])->name('pkl.store');
    Route::delete('/pkl/{id_pkl}', [PklController::class, 'destroy'])->name('pkl.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/create', [LaporanController::class, 'create'])->name('laporan.create');
    Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');
    Route::get('/laporan/{id_laporan}/edit', [LaporanController::class, 'edit'])->name('laporan.edit');
    Route::match(['put', 'patch'], '/laporan/{id_laporan}', [LaporanController::class, 'update'])->name('laporan.update');
    Route::patch('/laporan/{id}/nilai', [LaporanController::class, 'updateNilai'])->name('laporan.updateNilai');
    Route::delete('/laporan/{id_laporan}', [LaporanController::class, 'destroy'])->name('laporan.destroy');
});

require __DIR__ . '/auth.php';
