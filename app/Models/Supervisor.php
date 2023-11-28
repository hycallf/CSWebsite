<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    use HasFactory;
    protected $table = 'supervisor';
    protected $primaryKey = 'id_supervisor';
    protected $keyType = 'string';
    protected $fillable = ['nama_supervisor', 'notelp', 'email'];


//     public function user()
//     {
//         return $this->hasOne(User::class, 'mahasiswa_nim', 'nim');
//     }
}
