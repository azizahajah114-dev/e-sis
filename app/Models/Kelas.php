<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $fillable = ['nama_kelas'];

    public function siswaLengkap() {
        return $this->hasMany(SiswaLengkap::class, 'kelas_id');
    }

     public function users()
    {
        return $this->hasMany(User::class, 'kelas_id');
    }

    public function izin()
    {
        return $this->hasManyThrough(
            Izin::class,   // model tujuan
            User::class,   // model perantara
            'kelas_id',    // FK di tabel users -> kelas
            'user_id',     // FK di tabel izin -> user
            'id',          // PK kelas
            'id'           // PK user
        );
    }
}
