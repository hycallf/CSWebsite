<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;
use App\Models\Role;
use App\Models\Mahasiswa;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
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

        Status::create([
            'name' => 'Aktif',
        ]);
        Status::create([
            'name' => 'Gap Year',
        ]);
        Status::create([
            'name' => 'Alumni',
        ]);
        Status::create([
            'name' => 'Drop out',
        ]);

        Mahasiswa::create([
            'nim' => '1710130001',
            'name' => 'Abdul Fattah Kusnandar',
            'angkatan' => '2017',
            'status_id'=> '3'
        ]);

        Mahasiswa::create([
            'nim' => '2010130010',
            'name' => 'Muhammad Haikal Fuady',
            'angkatan' => '2020',
            'status_id'=> '1'
        ]);
    }
}
