<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Aji Pamungkas',
            'nis' => '000000',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

           User::create([
            'nama' => 'Azizah Hajar',
            'nis' => '130709',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);
    }
}
