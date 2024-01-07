<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Mime\Email;
use Illuminate\Support\Facades\View;
use App\Mail\SendEmail;

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

    }

    public function store(Request $request)
    {
        $sendData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'subject' => 'Selamat '.$request->name.'! Akun Anda telah berhasil didaftarkan',
        ];

        User::create([
            'username' => $request->username,
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $userEmail = $request->input('email');
        $subject = 'Selamat! Akun Anda telah berhasil didaftarkan';
   
        $this->sendUserRegistrationEmail($userEmail, $sendData);


        Alert::success('Success', 'Berhasil menambah data user');
        return redirect()->back();

    }

    private function sendUserRegistrationEmail($email, $sendData){
        $emailMessage = (new SendEmail($sendData));

        // Send the email
        Mail::to($email)->send($emailMessage);
    }

    public function update(Request $request, String $username) : RedirectResponse
    {
        $dsn = User::where('username', $username)->first();

        if ($dsn) {
            $dsn->update([
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
