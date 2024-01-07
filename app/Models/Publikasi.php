<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publikasi extends Model
{
    use HasFactory;
    use \Conner\Tagging\Taggable;
    protected $table = 'publikasi';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function mahasiswas()
    {
        return $this->belongsToMany(Mahasiswa::class, 'publikasi_mahasiswa');
    }

    public function dosens()
    {
        return $this->belongsToMany(Dosen::class, 'publikasi_dosen');
    }
}
