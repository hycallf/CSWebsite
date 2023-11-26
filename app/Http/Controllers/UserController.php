<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class userController extends Controller
{
    public function index()
    {
        $user = User::all();
        $mahasiswaWithoutAccount = Mahasiswa::whereNotExists(function ($query) {
            $query->select(DB::raw(1))
                ->from('users')
                ->whereRaw('mahasiswa.nim = users.username');
        })->where('status', 'aktif')->get();

        $dosenWithoutAccount = Dosen::whereNotExists(function ($query) {
            $query->select(DB::raw(1))
                ->from('users')
                ->whereRaw('dosen.nidp = users.username');
        })->get();

        $role = User::$roles;
        
        return view('admin.data_user', [
            'data_user' => $user,
            'data_mahasiswa' => $mahasiswaWithoutAccount,
            'data_dosen' => $dosenWithoutAccount,
            'roles' => $role,
            'title' => 'Data User'
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
        
        User::create([
            'username' => $request->username,
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Alert::success('Success', 'Berhasil menambah data user');
        return redirect()->back();

        // dd($request->all());

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // $user = User::all();
        // return view('admin.data_user', compact('user'));

        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $username) : RedirectResponse
    {
        $dsn = User::where('username', $username)->first();

        if ($dsn) {
            $dsn->update([
                // 'username' => $request->username,
                // 'name' => $request->name,
                // 'role' => $request->role,
                'email' => $request->email,
            ]);

            Alert::success('Success', 'Berhasil mengubah data user');
            return redirect('/user');
        } else {
            Alert::error('Error', 'Data tidak ditemukan');
            return redirect('/user');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $username)
    {
        $dsn = User::where('username', $username)->first();

        if ($dsn) {
            // Delete the record
            $dsn->delete();
            Alert::success('Success', 'Berhasil menghapus data user');
            return redirect('/user');
            
        } else {
            return redirect('/user')->with('error', 'Data not found');
            Alert::error('Error', 'Data tidak ditemukan');
        }
    }
}
