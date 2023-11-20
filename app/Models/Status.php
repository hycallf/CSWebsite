<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'status_mahasiswa';
    protected $guarded = ['id_status'];

    public function Mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }

}