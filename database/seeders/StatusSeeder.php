<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Status;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
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


        
    }
}
