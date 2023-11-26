<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;

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
    return view('/home');
});
// Route::get('/home', function () {
//     return view('/home');
// });

Route::get('/dashboard', [AdminController::class, 'index']);

// CRUD MAHASISWA
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::post('/mahasiswa/store', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::put('/mahasiswa/update/{nim}', [MahasiswaController::class, 'update']);
Route::delete('/mahasiswa/destroy/{nim}', [MahasiswaController::class, 'destroy']);

// auth
// Route::get('/login', [LoginController::class, 'showLoginForm']);
// Route::post('/login', [LoginController::class, 'authenticate']);
// Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
// Route::post('/login', [AuthController::class, 'authenticate']);
// Route::post('/logout', [AuthController::class, 'logout']);
// Route::post('/register', [AuthController::class, 'store']);


Route::get('/mahasiswa', 'App\Http\Controllers\MahasiswaController@experimental');

Route::post('/mahasiswa/store', 'App\Http\Controllers\MahasiswaController@store');

Route::get('/mahasiswa/tambah','App\Http\Controllers\MahasiswaController@tambah');

Route::get('/mahasiswa/edit/{id}','App\Http\Controllers\MahasiswaController@edit');

Route::post('/mahasiswa/update','App\Http\Controllers\MahasiswaController@update');

Route::get('/data_supervisor','App\Http\Controllers\SupervisorController@show');

Route::post('/data_supervisor/store','App\Http\Controllers\SupervisorController@store');
