<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jurusan::create([
            'nama_jurusan' => 'PPLG'
        ]);

        Jurusan::create([
            'nama_jurusan' => 'Elektro'
        ]);

        Jurusan::create([
            'nama_jurusan' => 'Kimia'
        ]);

        Jurusan::create([
            'nama_jurusan' => 'Mesin'
        ]);

        Jurusan::create([
            'nama_jurusan' => 'Las'
        ]);
    }
}
