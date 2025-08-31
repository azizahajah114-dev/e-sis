<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
        User::create([
            'nama' => 'Budi',
            'nis' => '111111',
            'password' => Hash::make('password'),
            'role' => 'petugas'
        ]);
    }
    }
}
