<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instansi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class InstansiController extends Controller
{
    public function index()
    {
        $instansi = Instansi::all();
        
        return view('admin.data_instansi', [
            'data_instansi' => $instansi,
            'title' => 'Data Instansi'
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
        
        Instansi::create([
            'id' => $request->id,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'bidang' => $request->bidang,
        ]);

        Alert::success('Success', 'Berhasil menambah data instansi');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // $instansi = Instansi::all();
        // return view('admin.data_instansi', compact('instansi'));

        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instansi $instansi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id) : RedirectResponse
    {
        $dsn = Instansi::where('id', $id)->first();

        if ($dsn) {
            $dsn->update([
                'id' => $request->id,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'bidang' => $request->bidang,
            ]);

            Alert::success('Success', 'Berhasil mengubah data instansi');
            return redirect('/instansi');
        } else {
            Alert::error('Error', 'Data tidak ditemukan');
            return redirect('/instansi');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $dsn = Instansi::where('id', $id)->first();

        if ($dsn) {
            // Delete the record
            $dsn->delete();
            Alert::success('Success', 'Berhasil menghapus data instansi');
            return redirect('/instansi');
            
        } else {
            return redirect('/instansi')->with('error', 'Data not found');
            Alert::error('Error', 'Data tidak ditemukan');
        }
    }
}
