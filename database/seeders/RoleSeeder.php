<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        
        Role::create([
            'name' => 'Admin',
        ]);
        Role::create([
            'name' => 'Dosen',
        ]);
        Role::create([
            'name' => 'Mahasiswa',
        ]);

        
    }
}
