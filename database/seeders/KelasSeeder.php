<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::create([
            'nama_kelas' => '11 PPLG 1'
        ]);

        Kelas::create([
            'nama_kelas' => '11 PPLG 2'
        ]);

        Kelas::create([
            'nama_kelas' => '11 PPLG 3'
        ]);

        Kelas::create([
            'nama_kelas' => '11 PPLG 4'
        ]);
    }
}
