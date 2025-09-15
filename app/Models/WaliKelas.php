<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaliKelas extends Model
{
    use HasFactory;

    protected $table = 'walikelas';

    protected $fillable = [
        'nama_walikelas',
        'kelas_id',
        'nomor_hp',
        'status'
    ];

    public function kelas() {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
