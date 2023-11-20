<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::count();
        
        return view('admin.home', [
            'sum_mahasiswa' => $mahasiswa,
            'title' => 'Dashboard'
        ]);
    }
}