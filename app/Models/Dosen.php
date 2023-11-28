<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosen';
    protected $primaryKey = 'nidp';
    protected $keyType = 'string';

    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function publikasi()
    {
        return $this->belongsToMany(Publikasi::class, 'publikasi_dosen');
    }
}
