<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    protected $keyType = 'string';
    protected $fillable = ['nim', 'nama', 'angkatan', 'status','notelp','alamat','bio','foto_profile'];

    public static $statuses = [
        'aktif' => 'Aktif',
        'cuti' => 'Cuti',
        'alumni' => 'Alumni',
        'keluar' => 'Keluar',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function publikasi()
    {
        return $this->belongsToMany(Publikasi::class, 'publikasi_mahasiswa');
    }

    public function lomba()
    {
        return $this->belongsToMany(Lomba::class, 'lomba_mahasiswa');
    }
}
