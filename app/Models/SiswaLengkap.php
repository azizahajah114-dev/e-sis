<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaLengkap extends Model
{
    use HasFactory;

    protected $table = 'siswa_lengkap';

    protected $fillable = [
        'user_id',
        'kelas_id',
        'jurusan_id',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'nomor_hp',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kelas() {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function jurusan() {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
}
