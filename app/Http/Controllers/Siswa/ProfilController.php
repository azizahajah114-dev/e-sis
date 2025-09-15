<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function profil()
    {
        return view('siswa.profil.index');
    }

    public function dataDiri()
    {
        $user = auth()->user();
        $siswa = $user->siswaLengkap; // relasi hasOne dari User

        return view('siswa.profil.data-diri.index', compact('user', 'siswa'));
    }

    public function editDataDiri()
    {
        $user = auth()->user();

        // kalau belum ada, kasih instance kosong (supaya di blade tidak error)
        $siswa = $user->siswaLengkap ?? new \App\Models\SiswaLengkap();

        $kelas = Kelas::all();
        $jurusan = Jurusan::all();

        return view('siswa.profil.data-diri.edit', compact('siswa', 'kelas', 'jurusan'));
    }


    public function updateDataDiri(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'tempat_lahir'   => 'required|string|max:255',
            'tanggal_lahir'  => 'required|date',
            'jenis_kelamin'  => 'required|in:Laki-laki,Perempuan',
            'nomor_hp'       => 'nullable|string|max:20',
            'kelas_id'       => 'required|exists:kelas,id',
            'jurusan_id'     => 'required|exists:jurusan,id',
        ]);

        if ($user->siswaLengkap) {
            $user->siswaLengkap->update($validated);
        } else {
            $user->siswaLengkap()->create($validated);
        }

        return redirect()->route('siswa.profil.data-diri')
            ->with('success', 'Data diri berhasil disimpan.');
    }



    public function pengaturan()
    {
        return view('siswa.profil.pengaturan.index');
    }

    public function walikelas()
    {
        $user = auth()->user();

        // misal ambil walikelas berdasarkan kelas siswa
        $siswa = $user->siswaLengkap;

        $walikelas = null;
        if ($siswa && $siswa->kelas_id) {
            $walikelas = \App\Models\Walikelas::where('kelas_id', $siswa->kelas_id)->first();
        }

        return view('siswa.profil.walikelas.index', compact('walikelas'));
    }


    public function editPassword()
    {
        $siswa = auth()->user()->siswaLengkap;
        return view('siswa.profil.pengaturan.password.edit', compact('siswa'));
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Password lama tidak sesuai']);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('siswa.profil.pengaturan')->with('success', 'Password berhasil diperbarui');
    }

    public function destroy()
    {
        $siswa = auth()->user()->siswaLengkap;
        $siswa->delete();

        return redirect()->route('siswa.dashboard');
    }
}
