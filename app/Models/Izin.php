<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    use HasFactory;

    protected $table = 'izin';

    protected $fillable = [
        'user_id',
        'id_pemberi_izin',
        'id_walikelas',
        'jenis_izin',
        'keterangan',
        'jam_keluar',
        'tanggal',
        'status_izin',
        'disetujui_oleh',
    ];

    // Relasi ke User (siswa yang mengajukan izin)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke User (pemberi izin / petugas)
    public function pemberiIzin()
    {
        return $this->belongsTo(User::class, 'id_pemberi_izin');
    }

    // Relasi ke User (yang menyetujui)
    public function disetujuiOleh()
    {
        return $this->belongsTo(User::class, 'disetujui_oleh');
    }

    // Relasi ke walikelas
    public function walikelas()
    {
        return $this->belongsTo(Walikelas::class, 'id_walikelas');
    }
}
