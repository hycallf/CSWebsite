<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matakuliah;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliah = Matakuliah::all();
        
        return view('admin.data_matakuliah', [
            'data_matakuliah' => $matakuliah,
            'title' => 'Data Matakuliah'
        ]);
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
        
        Matakuliah::create([
            'id_matkul' => $request->id_matkul,
            'nama' => $request->nama,
            'sks' => $request->sks,
        ]);

        Alert::success('Success', 'Berhasil menambah data matakuliah');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // $matakuliah = Matakuliah::all();
        // return view('admin.data_matakuliah', compact('matakuliah'));

        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matakuliah $matakuliah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id) : RedirectResponse
    {
        $mk = Matakuliah::where('id_matkul', $id)->first();

        if ($mk) {
            $mk->update([
                'id_matkul' => $request->id_matkul,
                'nama' => $request->nama,
                'sks' => $request->sks,
            ]);

            Alert::success('Success', 'Berhasil mengubah data matakuliah');
            return redirect('/matakuliah');
        } else {
            Alert::error('Error', 'Data tidak ditemukan');
            return redirect('/matakuliah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $mk = Matakuliah::where('id_matkul', $id)->first();

        if ($mk) {
            // Delete the record
            $mk->delete();
            Alert::success('Success', 'Berhasil menghapus data matakuliah');
            return redirect('/matakuliah');
            
        } else {
            return redirect('/matakuliah')->with('error', 'Data not found');
            Alert::error('Error', 'Data tidak ditemukan');
        }
    }
}
