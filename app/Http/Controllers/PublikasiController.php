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

        // return dd($publikasi);
        
        return view('admin.data_publikasi', [
            'data_publikasi' => $publikasi,
            'mahasiswas' => $mahasiswa,
            'dosens' => $dosen,
            'title' => 'Data Publikasi'
        ]);

        //for createing modal confirmation
        // $title = 'Delete Data!';
        // $text = "Are you sure you want to delete?";
        // confirmDelete($title, $text);
    }

    // public function create()
    // {
    //     $mahasiswa = Mahasiswa::all();
    //     $dosen = Dosen::all();

    //     return view('publications.create', compact('mahasiswa', 'dosen'));
    // }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'mahasiswa' => 'array',
            'dosen' => 'array',
        ]);

        $publication = Publikasi::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        $publication->mahasiswa()->attach($request->mahasiswa);
        $publication->dosen()->attach($request->dosen);

        return redirect()->route('publications.index')->with('success', 'Publikasi created successfully');
    }

    // public function show($id)
    // {
    //     $publication = Publikasi::find($id);
    //     return view('publications.show', compact('publication'));
    // }

    // public function edit($id)
    // {
    //     $publication = Publikasi::find($id);
    //     $mahasiswa = Mahasiswa::all();
    //     $dosen = Dosen::all();

    //     return view('publications.edit', compact('publication', 'mahasiswa', 'dosen'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'content' => 'required',
    //         'mahasiswa' => 'array',
    //         'dosen' => 'array',
    //     ]);

    //     $publication = Publikasi::find($id);

    //     $publication->update([
    //         'title' => $request->title,
    //         'content' => $request->content,
    //     ]);

    //     $publication->mahasiswa()->sync($request->mahasiswa);
    //     $publication->dosen()->sync($request->dosen);

    //     return redirect()->route('publications.index')->with('success', 'Publikasi updated successfully');
    // }

    // public function destroy($id)
    // {
    //     $publication = Publikasi::find($id);
    //     $publication->mahasiswa()->detach();
    //     $publication->dosen()->detach();
    //     $publication->delete();

    //     return redirect()->route('publications.index')->with('success', 'Publikasi deleted successfully');
    // }
}
