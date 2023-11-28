<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Supervisor;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class SupervisorController extends Controller
{
   

    public function show(){

        // mengambil data dari table pegawai
        $supervisor = DB::table('supervisor')->get();
        
        // mengirim data pegawai ke view index
        return view('admin/data_supervisor',['supervisor' => $supervisor]);

    }

    // public function store(Request $request){
 
    //     DB::table('supervisor')->insert([
    //         //'id_supervisor' => $request->id_supervisor,
    //         'nama_supervisor' => $request->nama_supervisor,
    //         'notelp' => $request->notelp,
    //         'email' => $request->email,
    //     ]);
    //     // memanggil view tambah
    //     return redirect('/data_supervisor');
 
    // }

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

    // public function update(Request $request)
    // {
    //     // update data pegawai
    //     DB::table('supervisor')->where('id_supervisor',$request->id_supervisor)->update([
    //         'nama_supervisor' => $request->nama,
    //         'email' => $request->email,
    //         'notelp' => $request->notelp
            
    //     ]);
    //     // alihkan halaman ke halaman pegawai
    //     return redirect('/mahasiswa');
    // }

    //============================================================
    //
    //          FFFFFFFFFFFFFF   IIIII   XXXXX      XXXXX
    //          FFFFFFFFFFFFFF   IIIII   XXXXX      XXXXX
    //          FFFF             IIIII     XXXXX  XXXXX
    //          FFFF             IIIII       XXXXXXXX    
    //          FFFFFFFFFFFF     IIIII        XXXXXX
    //          FFFFFFFFFFFF     IIIII      XXXXXXXXXX
    //          FFFF             IIIII     XXXXX  XXXXX
    //          FFFF             IIIII   XXXXX      XXXXX
    //          FFFF             IIIII   XXXXX      XXXXX
    //          FFFF             IIIII   XXXXX      XXXXX
    //
    //============================================================

    public function index()
    {
        $supervisor = Supervisor::all();
        
        return view('admin.data_supervisor', [
            'data_supervisor' => $supervisor,
            'supervisor' => $supervisor,
            'title' => 'Data Supervisor'
        ]);

    }

    public function store(Request $request) : RedirectResponse
    {
        $id_supervisor = "SPV";

        Supervisor::create([
            'id_supervisor' => $id_supervisor,
            'nama_supervisor' => $request->nama_supervisor,
            'notelp' => $request->notelp,
            'email' => $request->email,
        ]);

        Alert::success('Success', 'Berhasil menambah data supervisor!');
        return redirect()->back();

    }

    public function update(Request $request, String $id_supervisor) : RedirectResponse
    {
        $supervisor = Supervisor::where('id_supervisor', $id_supervisor)->first();

        if ($supervisor) {
            $supervisor->update([
                'nama_supervisor' => $request->nama_supervisor,
                'notelp' => $request->notelp,
                'email' => $request->email,
            ]);

            Alert::success('Success', 'Berhasil mengubah data supervisor');
            return redirect()->back();
        } else {
            Alert::error('Error', 'Data tidak ditemukan');
            return redirect()->back();
        }
    }

    public function destroy(String $id_supervisor)
    {
        $supervisor = Supervisor::where('id_supervisor', $id_supervisor)->first();

    if ($supervisor) {
        // Delete the record
        $supervisor->delete();
        Alert::success('Success', 'Berhasil menghapus data supervisor');
        return redirect()->back();
        
    } else {
        return redirect('/supervisor')->with('error', 'Data not found');
        Alert::error('Error', 'Data tidak ditemukan');
    }
    }
}
