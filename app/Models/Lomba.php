<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
    use HasFactory;
    protected $table = 'lomba';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function mahasiswas()
    {
        return $this->belongsToMany(Mahasiswa::class, 'lomba_mahasiswa');
    }

    public static $pengakuan = [
        'internasional' => 'Internasional',
        'nasional' => 'Nasional',
        'provinsi' => 'Provinsi',
        'wilayah' => 'Wilayah',
    ];
}
