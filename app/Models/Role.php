<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'role';
    protected $guarded = ['id_role'];

    // public function posts()
    // {
    //     return $this->hasMany(Post::class);
    // }
}