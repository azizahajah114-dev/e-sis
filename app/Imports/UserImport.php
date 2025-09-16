<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Kelas;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;

class UserImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Normalisasi nama kelas (misalnya selalu kapital awal kata)
            $namaKelas = ucwords(strtolower(trim($row['kelas'])));

            // Cari kelas, kalau tidak ada buat baru
            $kelas = Kelas::firstOrCreate(
                ['nama_kelas' => $namaKelas],
                ['nama_kelas' => $namaKelas]
            );

            // Simpan user baru
            User::create([
                'nama'     => $row['nama'],
                'nis'      => $row['nis'],
                'password' => Hash::make($row['password'] ?? '12345678'), // default kalau kosong
                'role'     => strtolower($row['role']), // ambil dari kolom "role" di Excel
                'kelas_id' => $kelas->id,
            ]);
        }
    }
}
