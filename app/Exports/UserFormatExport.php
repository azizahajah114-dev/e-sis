<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserFormatExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // kosong dulu karena ini hanya format
        return collect([]);
    }

    public function headings(): array
    {
        return [
            'nama',
            'nis',
            'password',
            'role',
            'kelas',
        ];
    }
}
