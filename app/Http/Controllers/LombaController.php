<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Lomba;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class LombaController extends Controller
{
    //
    public function index()
    {
        $lomba = Lomba::all();
        $mahasiswa = Mahasiswa::all();
        
        return view('admin.data_lomba', [
            'data_lomba' => $lomba,
            'mahasiswas' => $mahasiswa,
            'pengakuan' => Lomba::$pengakuan,
            'title' => 'Data Lomba'
        ]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'penyelenggara' => 'required',
            'tanggal' => 'required',
            'pengakuan' => 'required',
            'capaian' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'mahasiswas' => 'array',
        ]);

        // $tags = explode(",", $request->tags);

        // Mengambil file gambar dari request
        $image = $request->file('foto');

        // Tentukan nama baru untuk file gambar (contoh: timestamp + nama asli)
        $fileName =  $request->tanggal . '_' . $request->nama. '.'.$image->getClientOriginalExtension();

        // Menyimpan gambar ke penyimpanan yang ditentukan
        // $path = $image->store('images', $newName, 'public');
        $image->move('images/prestasi', $fileName);
        $path = 'images/prestasi/' . $fileName;

        $Lomba = Lomba::create([
            'nama_kegiatan' => $request->nama,
            'penyelenggara' => $request->penyelenggara,
            'waktu_pelaksanaan' => $request->tanggal,
            'tingkat_pengakuan' => $request->pengakuan,
            'capaian_prestasi' => $request->capaian,
            'foto_kegiatan' => $path,
            'keterangan' => $request->keterangan,
        ]);

        
        // $Lomba->tag($tags);
        $Lomba->mahasiswas()->attach($request->mahasiswas);

        Alert::success('Success', 'Berhasil menambah data lomba');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $Lomba = Lomba::find($id);
        $Lomba->mahasiswas()->detach();
        Storage::delete($Lomba->foto_kegiatan);
        $Lomba->delete();

        Alert::success('Success', 'Berhasil menghapus data lomba');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'penyelenggara' => 'required',
            'tanggal' => 'required',
            'pengakuan' => 'required',
            'capaian' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'mahasiswas' => 'array',
        ]);

        $Lomba = Lomba::find($id);

        if ($Lomba) {
            // Mengambil file gambar dari request
            $image = $request->file('foto');

            // Tentukan nama baru untuk file gambar (contoh: timestamp + nama asli)
            $fileName =  $request->tanggal . '_' . $request->nama .'.'.$image->getClientOriginalExtension();

            // Menyimpan gambar ke penyimpanan yang ditentukan
            // $path = $image->store('images', $newName, 'public');
            $image->move('images/prestasi', $fileName);
            $path = 'images/prestasi/' . $fileName;
            $Lomba->update([
                'nama_kegiatan' => $request->nama,
                'penyelenggara' => $request->penyelenggara,
                'waktu_pelaksanaan' => $request->tanggal,
                'tingkat_pengakuan' => $request->pengakuan,
                'capaian_prestasi' => $request->capaian,
                'foto_kegiatan' => $path,
                'keterangan' => $request->keterangan,
            ]);

            $Lomba->mahasiswas()->sync($request->mahasiswas);

            Alert::success('Success', 'Berhasil mengubah data lomba');
            return redirect()->back();

        }
        else {
            Alert::error('Error', 'Data tidak ditemukan');
            return redirect()->back();
        }
    }
}
