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
        'gapyear' => 'Gap Year',
        'alumni' => 'Alumni',
        'dropout' => 'Drop Out',
        // Add other statuses as needed
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'mahasiswa_nim', 'nim');
    }
}
