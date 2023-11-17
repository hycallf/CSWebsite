<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $with = ['statuses'];

    public function Status()
    {
        
        return $this->belongsTo(Status::class, 'name');
    }
}

