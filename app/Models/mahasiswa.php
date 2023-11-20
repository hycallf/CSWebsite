<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    protected $guarded = ['mahasiswa_id'];

    public function Status()
    {
        
        return $this->belongsTo(Status::class, 'status_id');
    }
}

