<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Models\Mahasiswa;

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
    return view('guest/home');
});

Route::get('/admin', function () {
    return view('admin/home');
});
Route::get('/admin/data_mahasiswa', [MahasiswaController::class, 'index']);


Route::get('/login', function () {
    return view('auth/login');
});
