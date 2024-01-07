<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\mbkm;
use App\Models\Tipembkm;
use App\Models\Instansi;
use App\Models\Mahasiswa;
use App\Models\Supervisor;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class MbkmController extends Controller
{

    public function index()
    {
        $mbkm = mbkm::with(['mahasiswa', 'tipe_mbkm', 'instansi'])->get();
        //$mbkm = mbkm::all();

        $tipe_mbkm = Tipembkm::pluck('nama', 'id');
        $instansi = Instansi::pluck('nama', 'id');
        $mahasiswa = Mahasiswa::pluck('nama', 'nim');
        $supervisor = Supervisor::pluck('nama_supervisor', 'id_supervisor');
    
        //$mbkm = mbkm::with(['mahasiswa', 'tipe_mbkm', 'instansi'])->get();
        //return view('mbkm.create', compact('mbkmTypes', 'companies'));
        
        return view('admin.data_mbkm', [
            'data_mbkm' => $mbkm,
            'mbkm' => $mbkm,
            'title' => 'Data MB but may not be KM'
        ], compact('tipe_mbkm', 'instansi', 'mahasiswa', 'supervisor'));

    }

    public function store(Request $request) : RedirectResponse
    {

        mbkm::create([
            'nama_mbkm' => $request->nama_mbkm,
            'tipe_mbkm' => $request->tipe_mbkm,
            'id_instansi' => $request->id_instansi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'posisi' => $request->posisi,
            'id_supervisor' => $request->id_supervisor,
            'laporan_file' => $request->laporan_file,
            'nim_mahasiswa' => $request->nim_mahasiswa,
        ]);

        Alert::success('Success', 'Berhasil menambah data mbkm!');
        return redirect()->back();

    }

    public function update(Request $request, String $id_mbkm) : RedirectResponse
    {
        $mbkm = mbkm::where('id_mbkm', $id_mbkm)->first();

        if ($mbkm) {
            $mbkm->update([
                'nama_mbkm' => $request->nama_mbkm,
                'tipe_mbkm' => $request->tipe_mbkm,
                'id_instansi' => $request->id_instansi,
            ]);

            Alert::success('Success', 'Berhasil mengubah data mbkm');
            return redirect()->back();
        } else {
            Alert::error('Error', 'Data tidak ditemukan');
            return redirect()->back();
        }
    }

    public function destroy(String $id_mbkm)
    {
        $mbkm = mbkm::where('id_mbkm', $id_mbkm)->first();

    if ($mbkm) {
        // Delete the record
        $mbkm->delete();
        Alert::success('Success', 'Berhasil menghapus data mbkm');
        return redirect()->back();
        
    } else {
        return redirect('/mbkm')->with('error', 'Data not found');
        Alert::error('Error', 'Data tidak ditemukan');
    }
    }
}
