<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WaliKelas;
use App\Models\Kelas;
use Illuminate\Http\Request;

class WaliKelasController extends Controller
{
    public function index()
    {
        $walikelas = WaliKelas::with('kelas')->get();
        return view('admin.walikelas.index', compact('walikelas'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.walikelas.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_walikelas' => 'required|string|max:255',
            'nomor_hp' => [
                'required',
                'regex:/^62[0-9]{9,13}$/', // Harus mulai dengan 62 dan panjang 11–15 digit
            ],
            'kelas_id' => 'required|exists:kelas,id',
            'status' => 'required|in:aktif,nonaktif',
        ], [
            'nomor_hp.required' => 'Nomor HP wajib diisi',
            'nomor_hp.regex' => 'Nomor HP harus menggunakan format global. Contoh: 6281234567890',
        ]);

        WaliKelas::create($request->only(['nama_walikelas', 'nomor_hp', 'kelas_id', 'status']));

        return redirect()->route('admin.data-walikelas')->with('success', 'Data wali kelas berhasil ditambahkan');
    }

    public function edit(WaliKelas $walikelas)
    {
        $kelas = Kelas::all();
        return view('admin.walikelas.edit', compact('walikelas', 'kelas'));
    }

    public function update(Request $request, WaliKelas $walikelas)
    {
        $request->validate([
            'nama_walikelas' => 'required|string|max:255',
            'nomor_hp' => [
                'required',
                'regex:/^62[0-9]{9,13}$/',
            ],
            'kelas_id' => 'required|exists:kelas,id',
            'status' => 'required|in:aktif,nonaktif',
        ], [
            'nomor_hp.required' => 'Nomor HP wajib diisi',
            'nomor_hp.regex' => 'Nomor HP harus menggunakan format global. Contoh: 6281234567890',
        ]);

        $walikelas->update($request->only(['nama_walikelas', 'nomor_hp', 'kelas_id', 'status']));

        return redirect()->route('admin.data-walikelas')->with('success', 'Data wali kelas berhasil diperbarui');
    }

    public function destroy(WaliKelas $walikelas)
    {
        $walikelas->delete();
        return redirect()->route('admin.data-walikelas')->with('success', 'Data wali kelas berhasil dihapus');
    }
}
