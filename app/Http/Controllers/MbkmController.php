<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mbkm;
use App\Models\Tipembkm;
use App\Models\Instansi;
use App\Models\Mahasiswa;
use App\Models\Supervisor;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class MbkmController extends Controller
{

    
    public function index()
    {
        // $mbkm = Mbkm::with('mahasiswas', 'tipe_mbkm', 'instansi', 'supervisors')->get();
        $mbkm = Mbkm::all();

        // $tipe_mbkm = Tipembkm::pluck('nama', 'id');
        // $instansi = Instansi::pluck('nama', 'id');
        // $supervisor = Supervisor::pluck('nama_supervisor', 'id_supervisor');

        $tipe_mbkm = Tipembkm::all();
        $instansi = Instansi::all();
        $mahasiswas = Mahasiswa::all();
        $supervisors = Supervisor::all();
        
        //$mbkm = mbkm::with(['mahasiswa', 'tipe_mbkm', 'instansi'])->get();
        //return view('mbkm.create', compact('mbkmTypes', 'companies'));
        
        return view('admin.data_mbkm', [
            'data_mbkm' => $mbkm,
            'title' => 'Data MB but may not be KM',
            'tipe_mbkm' => $tipe_mbkm,
            'instansi' => $instansi,
            'mahasiswas' => $mahasiswas,
            'supervisors' => $supervisors,

        ]);

    }

    public function store(Request $request)
    {
        $kode;
        $countmg = 1;
        $countstu = 1;
        if($request->tipe_mbkm == 1){
            $kode = 'mg_'.$countmg;
            $countmg++;
        } elseif ($request->tipe_mbkm == 2) {
            $kode = 'stu_'.$countstu;
            $countstu++;
        }

        $validator = Validator::make($request->all(), [
            'laporan' => 'required|mimes:docx,pdf|max:4096', // Adjust validation rules
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            Alert::error('Error', $errors);
            return redirect()->back();

        }

        // Mengambil file gambar dari request
        $doc = $request->file('laporan');

        // Tentukan nama baru untuk file gambar (contoh: timestamp + nama asli)
        $fileName = 'Laporan_' . $request->mahasiswa . '_' . $request->nama_mbkm. '.'.$doc->getClientOriginalExtension();

        // Menyimpan gambar ke penyimpanan yang ditentukan
        // $path = $doc->store('docs', $newName, 'public');
        $doc->move('docs/laporan', $fileName);
        $path = 'docs/laporan/' . $fileName;

        mbkm::create([
            'id_mbkm' => $kode,
            'nama_mbkm' => $request->nama_mbkm,
            'tipe_mbkm' => $request->tipe_mbkm,
            'id_instansi' => $request->id_instansi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'posisi' => $request->posisi,
            'id_supervisor' => $request->id_supervisor,
            'laporan' => $path,
            'nim_mahasiswa' => $request->mahasiswa,
        ]);

        Alert::success('Success', 'Berhasil menambah data mbkm!');
        return redirect()->back();

    }

    public function update(Request $request, String $id_mbkm) : RedirectResponse
    {
        $mbkm = mbkm::where('id_mbkm', $id_mbkm)->first();


        // Mengambil file gambar dari request
        // $doc = $request->file('laporan');

        // Tentukan nama baru untuk file gambar (contoh: timestamp + nama asli)
        // if ($request->file('laporan')) {
        //     $fileName = 'Laporan_' . $request->mahasiswa . '_' . $request->nama_mbkm. '.'.$request->file('laporan')->getClientOriginalExtension();

        //     $doc->move('docs/laporan', $fileName);
        //     $path = 'docs/laporan/' . $fileName;
        //     $mbkm->laporan = $path;
        //     $mbkm->save();
        // } else {
        //     Alert::error('Error', 'Data tidak ditemukan');
        //     return redirect()->back();
        // }
        
        

        // Menyimpan gambar ke penyimpanan yang ditentukan
        // $path = $doc->store('docs', $newName, 'public');
        

        if ($mbkm) {
            $mbkm->update([
                'nama_mbkm' => $request->nama_mbkm,
                'tipe_mbkm' => $request->tipe_mbkm,
                'id_instansi' => $request->id_instansi,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_selesai' => $request->tanggal_selesai,
                'posisi' => $request->posisi,
                'id_supervisor' => $request->id_supervisor,
                'nim_mahasiswa' => $request->mahasiswa,
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
        Storage::disk('public')->delete($mbkm->laporan);
        $mbkm->delete();
        Alert::success('Success', 'Berhasil menghapus data mbkm');
        return redirect()->back();
        
    } else {
        return redirect('/mbkm')->with('error', 'Data not found');
        Alert::error('Error', 'Data tidak ditemukan');
    }
    }
}
