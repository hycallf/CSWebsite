<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publikasi;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use RealRashid\SweetAlert\Facades\Alert;

class PublikasiController extends Controller
{
    public function index()
    {
        $publikasi = Publikasi::all();
        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::all();
        
        return view('admin.data_publikasi', [
            'data_publikasi' => $publikasi,
            'mahasiswas' => $mahasiswa,
            'dosens' => $dosen,
            'title' => 'Data Publikasi'
        ]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penerbit' => 'required',
            'jurnal' => 'required',
            'tanggal_terbit' => 'required',
            'mahasiswas' => 'array',
            'dosens' => 'array',
        ]);

        $publication = Publikasi::create([
            'judul' => $request->judul,
            'penerbit' => $request->penerbit,
            'jurnal' => $request->jurnal,
            'tanggal_terbit' => $request->tanggal_terbit,
            'halaman' => $request->halaman,
            'volume' => $request->volume,
            'url'   => $request->url,
        ]);

        $publication->mahasiswas()->attach($request->mahasiswas);
        $publication->dosens()->attach($request->dosens);

        Alert::success('Success', 'Berhasil menambah data publikasi');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $publication = Publikasi::find($id);
        $publication->mahasiswas()->detach();
        $publication->dosens()->detach();
        $publication->delete();

        Alert::success('Success', 'Berhasil menghapus data publikasi');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'penerbit' => 'required',
            'jurnal' => 'required',
            'tanggal_terbit' => 'required',
            'mahasiswas' => 'array',
            'dosens' => 'array',
        ]);

        $publication = Publikasi::find($id);

        $publication->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        $publication->mahasiswas()->sync($request->mahasiswas);
        $publication->dosens()->sync($request->dosens);
    }

}
