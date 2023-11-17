<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {


        Mahasiswa::create([
            'nim' => '1710130001',
            'name' => 'Abdul Fattah Kusnandar',
            'angkatan' => '2017',
            'notelp'=>'08123131811',
            'status'=> '3'
        ]);

        Mahasiswa::create([
            'nim' => '2010130010',
            'name' => 'Muhammad Haikal Fuady',
            'angkatan' => '2020',
            'notelp'=>'081319476815',
            'status'=> '1'
        ]);
    }
}


// ,1710130001,Abdul Fattah Kusnandar,2017,,,,
// ,1710130002,Ahmad Rasyid Yusdi,,,,,
// ,1710130004,Ilyas Perlindungan,,,,,
// ,1710130005,Iwan Sinanto Ate,,,,,
// ,1710130007,M. Fu'Ad Zikri,,,,,
// ,1710130008,Mita Nurul Yatimah,,,,,
// ,1710130009,Muhammad Aidil Zartesya,,,,,
// ,1710130010,Mu'tashim Billah,,,,,
// ,1710130011,Risnawati,,,,,
// ,1810130001,Abdullah Ammar,,,,,
// ,1810130002,Aqilla Fadia Haya,,,,,
// ,1810130003,Gagas Ananta Mohammad,,,,,
// ,1810130004,Hafizh Al Karim,,,,,
// ,1810130005,Mohamad Akbar Wisnu Nadyanto,,,,,
// ,1810130006,Muhammad Rizky Perdana,,,,,
// ,1810130007,Muhammad Varriel Avenazh Nizar,,,,,
// ,1810130008,Muhammad Zulfikri Maulana,,,,,
// ,1810130009,Nasrullah,,,,,
// ,1810130010,Naufal Rasyid,,,,,
// ,1810130011,Sirajuddin Hawari,,,,,
// ,1810130012,Teuku Binzar Nawaf Musyaffa,,,,,
// ,1810130013,Trevy Jonatya Novella,,,,,
// ,1910130001,Aaqilla Dhiyaanisafa Goenawan,,,,,
// ,1910130002,Abdurrahman Faqih,,,,,
// ,1910130003,Ali Muhammad Olow,,,,,
// ,1910130004,Amanda Muchsin Chalik,,,,,
// ,1910130006,Avrijsto Amandri Achyar,,,,,
// ,1910130007,Bilal Abdul Qowy,,,,,
// ,1910130008,Faiz Hanafi,,,,,
// ,1910130010,Khonsa Mutmainnah,,,,,
// ,1910130011,M Akbar Riandi,,,,,
// ,1910130012,M. Bakhara Alief Rachman,,,,,
// ,1910130013,Muthiah Afifah,,,,,
// ,1910130014,Mutiara Persada Pulungan,,,,,
// ,2010130001,Afifah Khairiyyah Rusli,,,,,
// ,2010130002,Ahmad Nur Hidaya,,,,,
// ,2010130003,Alif Zaky Cakramusi Putra,,,,,
// ,2010130004,Andi Muhammad Fikri Amir Fadhlurrahman,,,,,
// ,2010130005,Chiekal Mulia,,,,,
// ,2010130006,Damar Adji Sodikin,,,,,
// ,2010130007,Khaira Isyara,,,,,
// ,2010130008,Mohamad Reyhand Fatturrahman,,,,,
// ,2010130009,Muhammad Dhafin Urfan,,,,,
// ,2010130010,Muhammad Haikal Fuady,,,,,
// ,2010130011,Muhammad Ihsan Shiddiq,,,,,
// ,2010130012,Rangga Surya Prayoga,,,,,
// ,2010130013,Refido Arjunal Akmal,,,,,
// ,2010130014,Ryo Resha Herdiansyah,,,,,
// ,2010130015,El Thaariq Isad,,,,,
// ,2010130017,Muhammad Aldy Fadilla,,,,,
