<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mbkm extends Model
{
    use HasFactory;
    protected $table = 'mbkm';
    protected $primaryKey = 'id_mbkm';
    protected $keyType = 'string';
<<<<<<< HEAD
    protected $guarded = [''];
=======
    protected $fillable = ['tipe_mbkm', 'id_instansi', 'nama_mbkm', 'nim_mahasiswa', 'posisi', 'id_supervisor', 'file_laporan', 'tanggal_mulai', 'tanggal_selesai'];
>>>>>>> 50e0510ce5e48ff34e656d78e03ed664a7f696ea

    public function instansi()
    {
        return $this->belongsTo(Instansi::class);
    }

    public function tipe_mbkm()
    {
        return $this->belongsTo(Tipembkm::class);
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }

    public function supervisor()
    {
        return $this->hasMany(Supervisor::class);
    }

    //	id_mbkm	tipe_mbkm	id_instansi	nama_mbkm	created_at	updated_at	



}
