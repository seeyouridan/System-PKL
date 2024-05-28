<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\ProfileController;
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

require __DIR__.'/auth.php';
