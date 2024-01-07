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
    protected $fillable = ['tipe_mbkm', 'id_instansi', 'nama_mbkm', 'nim_mahasiswa', 'posisi', 'id_supervisor', 'file_laporan', 'tanggal_mulai', 'tanggal_selesai'];

    public function instansi()
    {
        return $this->hasOne(Instansi::class, 'id', 'id_instansi');
    }

    public function tipe_mbkm()
    {
        return $this->belongsTo(Tipembkm::class, 'tipe_mbkm', 'id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim_mahasiswa', 'nim');
    }

    //	id_mbkm	tipe_mbkm	id_instansi	nama_mbkm	created_at	updated_at	



}
