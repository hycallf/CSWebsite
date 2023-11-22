<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $guarded = ['id'];

    public static $statuses = [
        'aktif' => 'Aktif',
        'gapyear' => 'Gap Year',
        'alumni' => 'Alumni',
        'dropout' => 'Drop Out',
        // Add other statuses as needed
    ];
}
