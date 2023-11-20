<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $guarded = ['status_id'];

    public function Mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }

}