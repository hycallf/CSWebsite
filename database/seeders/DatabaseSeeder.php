<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;
use App\Models\Role;
use App\Models\Mahasiswa;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create([
            'role' => 'Admin',
        ]);
        
        Role::create([
            'role' => 'Dosen',
        ]);

        Role::create([
            'role' => 'Mahasiswa',
        ]);

        Status::create([
            'nama_status' => 'Aktif',
        ]);
        Status::create([
            'nama_status' => 'Gap Year',
        ]);
        Status::create([
            'nama_status' => 'Alumni',
        ]);
        Status::create([
            'nama_status' => 'Drop out',
        ]);

        User::create([
            'username'=> '2010130010',
            'name' => 'Muhammad Haikal Fuady',
            'id_role' => 1,
            'email' => 'ricardohaikal2001@gmail.com',
            'password' => 'admin123',
        ]);

        User::create([
            'username'=> '2010130001',
            'name' => 'Afiffah Khairiyyah Rusli',
            'id_role' => 3,
            'email' => 'affiffahiyah@gmail.com',
            'password' => 'asdasdasd',
        ]);

        Mahasiswa::create([
            'nim' => '1710130001',
            'nama' => 'Abdul Fattah Kusnandar',
            'angkatan' => '2017',
            'status'=> '3'
        ]);
        Mahasiswa::create([
            'nim' => '2010130001',
            'nama' => 'Afiffah Khairiyyah Rusli',
            'angkatan' => '2020',
            'status'=> '1'
        ]);
        Mahasiswa::create([
            'nim' => '2010130002',
            'nama' => 'Ahmad Nur Hidaya',
            'angkatan' => '2020',
            'status'=> '1'
        ]);
        Mahasiswa::create([
            'nim' => '2010130003',
            'nama' => 'Alif Zaky ChakraUnlimited',
            'angkatan' => '2020',
            'status'=> '1'
        ]);
        Mahasiswa::create([
            'nim' => '2010130004',
            'nama' => 'Andi Muhammad Fikri',
            'angkatan' => '2020',
            'status'=> '1'
        ]);

        Mahasiswa::create([
            'nim' => '2010130010',
            'nama' => 'Muhammad Haikal Fuady',
            'angkatan' => '2020',
            'status'=> '1'
        ]);
    }
}
