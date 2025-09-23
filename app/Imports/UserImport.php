<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Kelas;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UserImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
    {
        // Normalisasi nama kelas
        $namaKelas = ucwords(strtolower(trim($row['kelas'])));

        // Cari atau buat kelas
        $kelas = Kelas::firstOrCreate(
            ['nama_kelas' => $namaKelas],
            ['nama_kelas' => $namaKelas]
        );

        return new User([
            'nama'     => $row['nama'],
            'nis'      => $row['nis'],
            'password' => Hash::make($row['password'] ?? '12345678'),
            'role'     => strtolower($row['role']),
            'kelas_id' => $kelas->id,
        ]);
    }

    public function rules(): array
    {
        return [
            '*.nis' => [
                'required',
                Rule::unique('users', 'nis'),
            ],
            '*.nama' => 'required|string|max:255',
            '*.password' => 'nullable|min:6',
            '*.role' => 'required|in:siswa,petugas',
        ];
    }

    public function customValidationMessages()
    {
        return [
            '*.nis.unique'   => 'NIS :input sudah terdaftar!',
            '*.nis.required' => 'NIS wajib diisi.',
        ];
    }
}
