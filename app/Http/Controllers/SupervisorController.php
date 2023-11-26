<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Status;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;

class SupervisorController extends Controller
{
    public function show(){

        // mengambil data dari table pegawai
        $supervisor = DB::table('supervisor')->get();
        
        // mengirim data pegawai ke view index
        return view('admin/data_supervisor',['supervisor' => $supervisor]);

    }

    public function store(Request $request){
 
        DB::table('supervisor')->insert([
            //'id_supervisor' => $request->id_supervisor,
            'nama_supervisor' => $request->nama_supervisor,
            'notelp' => $request->notelp,
            'email' => $request->email,
        ]);
        // memanggil view tambah
        return redirect('/data_supervisor');
 
    }

    public function tambah()
    {
	    // memanggil view tambah
	    return view('data_supervisor/tambah');
    }

    //
    public function edit($nim)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $mahasiswa = DB::table('supervisor')->where('nim', $nim)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('mahasiswa/edit',['mahasiswa' => $mahasiswa]);
    }

    public function update(Request $request)
    {
        // update data pegawai
        DB::table('supervisor')->where('id_supervisor',$request->id_supervisor)->update([
            'nama_supervisor' => $request->nama,
            'email' => $request->email,
            'notelp' => $request->notelp
            
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/mahasiswa');
    }

}
