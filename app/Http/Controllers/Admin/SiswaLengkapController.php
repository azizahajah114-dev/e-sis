<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiswaLengkap;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class SiswaLengkapController extends Controller
{
    public function index()
    {
        $siswaLengkap = User::with('siswaLengkap.kelas', 'siswaLengkap.jurusan')
            ->where('role', 'siswa')
            ->get();


        return view('admin.siswa.index', compact('siswaLengkap'));
    }

    public function create()
    {
        $users = User::where('role', 'siswa')->get(); // hanya siswa
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();

        return view('admin.siswa.create', compact('users', 'kelas', 'jurusan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'kelas_id' => 'nullable|exists:kelas,id',
            'jurusan_id' => 'nullable|exists:jurusan,id',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'nomor_hp' => 'nullable|string|max:15',
        ]);


        SiswaLengkap::create($request->all());

        return redirect()->route('admin.data-siswa')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit(SiswaLengkap $siswa)
    {
        $users = User::where('role', 'siswa')->get();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();

        return view('admin.siswa.edit', compact('siswa', 'users', 'kelas', 'jurusan'));
    }

    public function update(Request $request, SiswaLengkap $siswa)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'kelas_id' => 'nullable|exists:kelas,id',
            'jurusan_id' => 'nullable|exists:jurusan,id',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'nomor_hp' => 'nullable|string|max:15',
        ]);


        $siswa->update($request->all());

        return redirect()->route('admin.data-siswa')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(SiswaLengkap $siswa)
    {
        $siswa->delete();
        return redirect()->route('admin.data-siswa')->with('success', 'Data siswa berhasil dihapus.');
    }
}
