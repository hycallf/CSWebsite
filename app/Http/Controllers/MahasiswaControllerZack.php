<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function experimental(){

        // mengambil data dari table pegawai
        $mahasiswa = DB::table('mahasiswa')->get();
        
        // mengirim data pegawai ke view index
        return view('mahasiswa/experimental',['mahasiswa' => $mahasiswa]);

    }

    public function store(Request $request){
 
        DB::table('mahasiswa')->insert([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'role' => $request->role,
            'angkatan' => $request->angkatan,
            'notelp' => $request->notelp,
            'alamat' => $request->alamat,
            'bio' => $request->bio,
            'status' => $request->status,
        ]);
        // memanggil view tambah
        return redirect('/mahasiswa');
 
    }

    public function tambah()
    {
	    // memanggil view tambah
	    return view('mahasiswa/tambah');
    }

    //
    public function edit($nim)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $mahasiswa = DB::table('mahasiswa')->where('nim', $nim)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('mahasiswa/edit',['mahasiswa' => $mahasiswa]);
    }

    public function update(Request $request)
    {
        // update data pegawai
        DB::table('mahasiswa')->where('nim',$request->nim)->update([
            'nama' => $request->nama,
            'role' => $request->role,
            'angkatan' => $request->angkatan,
            'alamat' => $request->alamat,
            'bio' => $request->bio,
            'status' => $request->status,
            'notelp' => $request->notelp
            
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/mahasiswa');
    }

}
