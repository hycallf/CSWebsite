<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mbkm;
use App\Models\Tipembkm;
use App\Models\Instansi;
use App\Models\Mahasiswa;
use App\Models\Supervisor;
use App\Models\Lomba;

use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tipe_mbkm = Tipembkm::all();
        $instansi = Instansi::all();
        $mahasiswas = Mahasiswa::all();
        $supervisors = Supervisor::all();
        $lomba = Lomba::all();

        return view('guest.home', [
            'data_mbkm' => $mbkm,
            'title' => 'Data MB but may not be KM',
            'tipe_mbkm' => $tipe_mbkm,
            'instansi' => $instansi,
            'mahasiswas' => $mahasiswas,
            'supervisors' => $supervisors,
            'lomba' => $lomba,

        ]);
    }
}
