<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        // $status = Mahasiswa::$statuses;
        // $mahasiswa = DB::table('mahasiswas')->get();

        // return dd($mahasiswa);
        
        return view('admin.data_mahasiswa', [
            'data_mahasiswa' => $mahasiswa,
            'statuses' => Mahasiswa::$statuses,
            'title' => 'Data Mahasiswa'
        ]);

        //for createing modal confirmation
        // $title = 'Delete Data!';
        // $text = "Are you sure you want to delete?";
        // confirmDelete($title, $text);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        // $validatedData = $request->validate([
        //     'nim' => 'required',
        //     'nama' => 'required',
        //     'angkatan' => 'required',
        //     'status' => 'required',
        //     // Add more fields as needed
        // ]);

        // Mahasiswa::create($validatedData);
        Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'angkatan' => $request->angkatan,
            'status'=> $request->status,
            'notelp' => $request->notelp,
            'alamat' => $request->alamat,
        ]);

        Alert::success('Success', 'Berhasil menambah data mahasiswa');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // $mahasiswa = Mahasiswa::all();
        // return view('admin.data_mahasiswa', compact('mahasiswa'));

        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $nim) : RedirectResponse
    {
        $mhs = Mahasiswa::where('nim', $nim)->first();

        if ($mhs) {
            $mhs->update([
                'nim' => $request->nim,
                'nama' => $request->nama,
                'angkatan' => $request->angkatan,
                'status' => $request->status,
                'notelp' => $request->notelp,
                'alamat' => $request->alamat,
            ]);

            Alert::success('Success', 'Berhasil mengubah data mahasiswa');
            return redirect('/mahasiswa');
        } else {
            Alert::error('Error', 'Data tidak ditemukan');
            return redirect('/mahasiswa');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $nim)
    {
        $mhs = Mahasiswa::where('nim', $nim)->first();

    if ($mhs) {
        // Delete the record
        $mhs->delete();
        Alert::success('Success', 'Berhasil menghapus data mahasiswa');
        return redirect('/mahasiswa');
        
    } else {
        return redirect('/mahasiswa')->with('error', 'Data not found');
        Alert::error('Error', 'Data tidak ditemukan');
    }
    }
}
