<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Instansi;
use App\Models\Supervisor;
use App\Models\Tipembkm;
use App\Models\Mbkm;
// use Carbon\Carbon;

class MbkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tipembkm::create([
            'nama' => 'Magang',
        ]);

        Tipembkm::create([
            'nama' => 'Studi Independen',
        ]);

        Instansi::create([
            'nama' => 'Bangkit Academy',
            'alamat' => 'Jalan bahagia bersama',
            'kontak' => 'bangkitacademy@gmail.com',
            'website' => 'bangkitacademy.com',
            'bidang' => 'education',
        ]);

        Supervisor::create([
            'nama_supervisor' => 'Jaenab',
            'notelp' => '0812391231',
            'email' => 'Jaenab@gmail.com',
        ]);
    }
}
