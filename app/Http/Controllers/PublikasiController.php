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
        // $status = Publikasi::$statuses;
        // $publikasi = DB::table('publikasis')->get();

        // return dd($publikasi);
        
        return view('admin.data_publikasi', [
            'data_publikasi' => $publikasi,
            'title' => 'Data Publikasi'
        ]);

        //for createing modal confirmation
        // $title = 'Delete Data!';
        // $text = "Are you sure you want to delete?";
        // confirmDelete($title, $text);
    }
}
