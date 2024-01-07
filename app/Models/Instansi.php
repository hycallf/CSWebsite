<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;
    protected $table = 'instansi';
    protected $primaryKey = 'id';

    protected $guarded = [];
    
    public function mbkm()
    {
        return $this->hasMany(Mbkm::class);
    }

}
