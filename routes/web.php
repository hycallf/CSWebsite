<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TipembkmController;
use App\Http\Controllers\MbkmController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\PublikasiController;

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
    // $config = new \Smalot\PdfParser\Config();
    // $config->setFontSpaceLimit(-60);
    // // $config->setIgnoreEncryption(true);
    // $config->setHorizontalOffset('');
    // $config->setHorizontalOffset("\t");
    // $config->setRetainImageContent(false);
    // $parser = new \Smalot\PdfParser\Parser([], $config);
    // $path = storage_path('app/Docs/CV.pdf');
    // $pdf = $parser->parseFile($path);
    // $firstpage = $pdf->getPages()[0];
    // $data = $firstpage->getDataTm();
    // $text = $data[1][1];
    // // $text = $pdf->getText();
    // $pages = $pdf->getPages();
    // dd($data);
});
// Route::get('/home', function () {
//     return view('/home');
// });

Route::get('/dashboard', [AdminController::class, 'index']);

// CRUD MAHASISWA
Route::resource('mahasiswa', MahasiswaController::class);
// Route::post('/mahasiswa/store', [MahasiswaController::class, 'store']);
// Route::put('/mahasiswa/update/{nim}', [MahasiswaController::class, 'update']);
// Route::delete('/mahasiswa/destroy/{nim}', [MahasiswaController::class, 'destroy']);

// CRUD DOSEN
Route::resource('dosen', DosenController::class);
// Route::post('/dosen/store', [DosenController::class, 'store']);
// Route::put('/dosen/update/{nidp}', [DosenController::class, 'update']);
// Route::delete('/dosen/destroy/{nidp}', [DosenController::class, 'destroy']);

// CRUD USER
Route::resource('user', UserController::class);
// Route::post('/user/store', [UserController::class, 'store']);
// Route::put('/user/update/{nidp}', [UserController::class, 'update']);
// Route::delete('/user/destroy/{nidp}', [UserController::class, 'destroy']);

// CRUD TIPE MBKM
Route::resource('tipe_mbkm', TipembkmController::class);
// Route::post('/tipe_mbkm/store', [TipembkmController::class, 'store']);
// Route::put('/tipe_mbkm/update/{id}', [TipembkmController::class, 'update']);
// Route::delete('/tipe_mbkm/destroy/{id}', [TipembkmController::class, 'destroy']);

// CRUD INSTANSE
Route::resource('instansi', InstansiController::class);
// Route::get('/instansi', [InstansiController::class, 'index']);
// Route::post('/instansi/store', [InstansiController::class, 'store']);
// Route::put('/instansi/update/{id}', [InstansiController::class, 'update']);
// Route::delete('/instansi/destroy/{id}', [InstansiController::class, 'destroy']);

// CRUD SUPERVISOR
Route::resource('supervisor', SupervisorController::class);
// Route::post('/supervisor/store', [SupervisorController::class, 'store']);
// Route::put('/supervisor/update/{id_supervisor}', [SupervisorController::class, 'update']);
// Route::delete('/supervisor/destroy/{id_supervisor}', [SupervisorController::class, 'destroy']);


// CRUD MATAKULIAH
Route::resource('matakuliah', MatakuliahController::class);

//CRUD MBKM
Route::resource('mbkm', MbkmController::class);

// CRUD PUBLIKASI
Route::resource('publikasi', PublikasiController::class);

// auth
// Route::get('/login', [LoginController::class, 'showLoginForm']);
// Route::post('/login', [LoginController::class, 'authenticate']);
// Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
// Route::post('/login', [AuthController::class, 'authenticate']);
// Route::post('/logout', [AuthController::class, 'logout']);
// Route::post('/register', [AuthController::class, 'store']);
