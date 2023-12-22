<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipembkm extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'tipe_mbkm';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function tipe_mbkm()
    {
        return $this->belongsTo(Mbkm::class, 'id', 'tipe_mbkm');
    }
}
