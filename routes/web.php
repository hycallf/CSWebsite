<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TipembkmController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\PublikasiController;
use App\Http\Controllers\LombaController;
use App\Http\Controllers\MbkmController;


Route::get('/', function () {
    return view('/home');
});

Route::get('/dashboard', [AdminController::class, 'index']);

// CRUD MAHASISWA
Route::resource('mahasiswa', MahasiswaController::class);

// CRUD DOSEN
Route::resource('dosen', DosenController::class);

// CRUD USER
Route::resource('user', UserController::class);

// CRUD TIPE MBKM
Route::resource('tipe_mbkm', TipembkmController::class);

// CRUD INSTANSE
Route::resource('instansi', InstansiController::class);

// CRUD SUPERVISOR
Route::resource('supervisor', SupervisorController::class);
// CRUD MATAKULIAH
Route::resource('matakuliah', MatakuliahController::class);
// CRUD PUBLIKASI
Route::resource('publikasi', PublikasiController::class);
// CRUD LOMBA
Route::resource('lomba', LombaController::class);

Route::resource('mbkm', MbkmController::class);


// Route::get('/fetch-data', [PublikasiController::class, 'fetchData']);
// auth
// Route::get('/login', [LoginController::class, 'showLoginForm']);
// Route::post('/login', [LoginController::class, 'authenticate']);
// Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
// Route::post('/login', [AuthController::class, 'authenticate']);
// Route::post('/logout', [AuthController::class, 'logout']);
// Route::post('/register', [AuthController::class, 'store']);
