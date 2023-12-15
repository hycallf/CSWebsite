<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Publikasi;
use Carbon\Carbon;

class PublikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Publikasi::create([
            'judul' => 'Designing the IAPS 4.0 Accreditation System with an Object Oriented Approach: Case Study of the Computer Science Study Program STIMIK ESQ',
            'jurnal' => 'Jurnal I-STATEMENT: Information System and Technology Management',
            'penerbit' => 'STIMIK ESQ',
            'volume' => 'Vol. 5 No. 2',
            'tanggal_terbit' => Carbon::parse('2020-01-01'),
            'halaman' => '103-110',
            'url' => 'https://jurnal.esqbs.ac.id/index.php/istatement/article/view/253',
        ]);

        Publikasi::create([
            'judul' => 'PENGENALAN TANAMAN CABAI DENGAN TEKNIK KLASIFIKASI
            MENGGUNAKAN METODE CNN',
            'jurnal' => 'Seminar Nasional Mahasiswa Bidang Ilmu Komputer dan Aplikasinya (SENAMIKA 2020 II)',
            'penerbit' => 'UPN Veteran Jakarta',
            'volume' => 'Vol. 1 No. 2',
            'tanggal_terbit' => Carbon::parse('2020-01-01'),
            'halaman' => '15-22',
            'url' => 'http://t.ly/jbNK',
           
        ]);
    }
}
