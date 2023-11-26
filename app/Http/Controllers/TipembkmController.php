<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipembkm;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class TipembkmController extends Controller
{
    public function index()
    {
        $tipe_mbkm = Tipembkm::all();
        
        return view('admin.tipe_mbkm', [
            'tipe_mbkm' => $tipe_mbkm,
            'title' => 'Data Jenis MBKM'
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
        
        Tipembkm::create([
            'nama' => $request->nama,
        ]);

        Alert::success('Success', 'Berhasil menambah data tipe_mbkm');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // $tipe_mbkm = Tipembkm::all();
        // return view('admin.data_tipe_mbkm', compact('tipe_mbkm'));

        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $tipe_mbkm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id) : RedirectResponse
    {
        $dsn = Tipembkm::where('id', $id)->first();

        if ($dsn) {
            $dsn->update([
                'id' => $request->id,
                'nama' => $request->nama,
                'notelp' => $request->notelp,
            ]);

            Alert::success('Success', 'Berhasil mengubah data tipe_mbkm');
            return redirect('/tipe_mbkm');
        } else {
            Alert::error('Error', 'Data tidak ditemukan');
            return redirect('/tipe_mbkm');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $dsn = Tipembkm::where('id', $id)->first();

        if ($dsn) {
            // Delete the record
            $dsn->delete();
            Alert::success('Success', 'Berhasil menghapus data tipe_mbkm');
            return redirect('/tipe_mbkm');
            
        } else {
            return redirect('/tipe_mbkm')->with('error', 'Data not found');
            Alert::error('Error', 'Data tidak ditemukan');
        }
    }
}
