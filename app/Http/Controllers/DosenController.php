<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::all();
        
        return view('admin.data_dosen', [
            'data_dosen' => $dosen,
            'title' => 'Data Dosen'
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
        
        Dosen::create([
            'nidp' => $request->nidp,
            'nama' => $request->nama,
            'notelp' => $request->notelp,
        ]);

        Alert::success('Success', 'Berhasil menambah data dosen');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // $dosen = Dosen::all();
        // return view('admin.data_dosen', compact('dosen'));

        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dosen $dosen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $nidp) : RedirectResponse
    {
        $dsn = Dosen::where('nidp', $nidp)->first();

        if ($dsn) {
            $dsn->update([
                'nidp' => $request->nidp,
                'nama' => $request->nama,
                'notelp' => $request->notelp,
            ]);

            Alert::success('Success', 'Berhasil mengubah data dosen');
            return redirect('/dosen');
        } else {
            Alert::error('Error', 'Data tidak ditemukan');
            return redirect('/dosen');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $nidp)
    {
        $dsn = Dosen::where('nidp', $nidp)->first();

        if ($dsn) {
            // Delete the record
            $dsn->delete();
            Alert::success('Success', 'Berhasil menghapus data dosen');
            return redirect('/dosen');
            
        } else {
            return redirect('/dosen')->with('error', 'Data not found');
            Alert::error('Error', 'Data tidak ditemukan');
        }
    }
}
