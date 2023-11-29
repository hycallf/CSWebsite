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
            'volume_no' => 'Vol. 5 No. 2',
            'tanggal_terbit' => Carbon::parse('2020-01-01'),
            'halaman' => '103-110',
            'url' => 'https://jurnal.esqbs.ac.id/index.php/istatement/article/view/253',
        ]);

        Publikasi::create([
            'judul' => 'PENGENALAN TANAMAN CABAI DENGAN TEKNIK KLASIFIKASI
            MENGGUNAKAN METODE CNN',
            'jurnal' => 'Seminar Nasional Mahasiswa Bidang Ilmu Komputer dan Aplikasinya (SENAMIKA 2020 II)',
            'penerbit' => 'UPN Veteran Jakarta',
            'volume_no' => 'Vol. 1 No. 2',
            'tanggal_terbit' => Carbon::parse('2020-01-01'),
            'halaman' => '15-22',
            'url' => 'http://t.ly/jbNK',
            'desc' => 'Sistem pengenalan untuk identifikasi jenis cabai berbasis komputer merupakan proses memasukkan informasi berupa citra cabai ke dalam komputer.',
            'abstrak' => 'Sistem pengenalan untuk identifikasi jenis cabai berbasis komputer merupakan proses memasukkan informasi berupa citra cabai ke dalam komputer. Selanjutnya komputer menterjemahkan serta mengidentifikasi
            jenis cabai tersebut. Pada penelitian ini telah dilakukan perancangan sistem identifikasi tanaman cabai yang memanfaatkan kamera smartphone untuk akuisisi data citra cabai. Selanjutnya dilakukan pemrosesan awal, ekstraksi ciri dan pengklasifikasian. Data yang digunakan sebagai standar referensi sebanyak 5 sampel untuk masing-masing jenis cabai yaitu cabai gunung, cabai rawit taiwan, cabai keriting merah, cabai keriting hijau, dan cabai rawit putih. Sedangkan untuk pengujian unjuk kerja sistem menggunakan 15 sampel untuk masingmasing jenis cabai. Pengujian unjuk kerja sistem dilakukan dengan melakukan ekstraksi ciri dan melakukan pelabelan terhadap warna dan bentuk buah cabai lalu kemudian menggunakan metode CNN untuk proses identifikasi jenis cabai. Hasil pengujian sistem identifikasi citra cabai menunjukkan tingkat akurasi sebesar
            80% pada proses training dan 80% pada tahap testing yang terjadi pada epoch ke-100.'
        ]);
    }
}
