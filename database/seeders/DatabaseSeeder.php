<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Tipembkm;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'username'=> '2010130010',
            'name' => 'Muhammad Haikal Fuady',
            'role' => 'admin',
            'email' => 'ricardohaikal2001@gmail.com',
            'password' => 'admin123',
        ]);

        User::create([
            'username'=> '2010130001',
            'name' => 'Afiffah Khairiyyah Rusli',
            'role' => 'mahasiswa',
            'email' => 'affiffahiyah@gmail.com',
            'password' => 'asdasdasd',
        ]);

        Mahasiswa::create([
            'nim' => '1710130001',
            'nama' => 'Abdul Fattah Kusnandar',
            'angkatan' => '2017',
            'status'=> 'Alumni'
        ]);
        Mahasiswa::create([
            'nim' => '2010130001',
            'nama' => 'Afiffah Khairiyyah Rusli',
            'angkatan' => '2020',
            'status'=> 'Aktif'
        ]);
        Mahasiswa::create([
            'nim' => '2010130002',
            'nama' => 'Ahmad Nur Hidaya',
            'angkatan' => '2020',
            'status'=> 'Aktif'
        ]);
        Mahasiswa::create([
            'nim' => '2010130003',
            'nama' => 'Alif Zaky ChakraUnlimited',
            'angkatan' => '2020',
            'status'=> 'Aktif'
        ]);
        Mahasiswa::create([
            'nim' => '2010130004',
            'nama' => 'Andi Muhammad Fikri',
            'angkatan' => '2020',
            'status'=> 'Aktif'
        ]);

        Mahasiswa::create([
            'nim' => '2010130010',
            'nama' => 'Muhammad Haikal Fuady',
            'angkatan' => '2020',
            'status'=> 'Aktif'
        ]);

        Dosen::create([
            'nidp' => '123731882',
            'nama' => 'Ahlijati Nuraminah',
            'notelp' => '0812312381',
        ]);

        Dosen::create([
            'nidp' => '123812938',
            'nama' => 'Ahmad Nur Ihsan Purwanto',
            'notelp' => '0812312322',
        ]);

        Dosen::create([
            'nidp' => '123812938',
            'nama' => 'Ahmad Nur Ihsan Purwanto',
            'notelp' => '0812312322',
        ]);

        Tipembkm::create([
            'nama' => 'Magang',
        ]);

        Tipembkm::create([
            'nama' => 'Studi Independen',
        ]);
    }
}
