<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all();

        return view('admin.petugas.index', compact('petugas'));
    }


    public function create()
    {
        $users = User::where('role', 'petugas')
            ->doesntHave('petugas')
            ->get();

        return view('admin.petugas.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|unique:petugas,user_id',
            'nip' => 'required|string|unique:petugas,nip|min:18|max:18',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        Petugas::create($request->all());

        return redirect()->route('admin.data-petugas')->with('success', 'Data petugas berhasil ditambahkan');
    }

    public function edit(Petugas $petugas)
    {
        $petugas->load('user');
        $users = User::where('role', 'petugas')->get();

        return view('admin.petugas.edit', compact('petugas', 'users'));
    }

    public function update(Request $request, Petugas $petugas)
    {
        $request->validate([
            'nama'   => 'required|string|max:255',
            'nip'    => 'required|string|min:18|max:18|unique:users,nis,' . $petugas->user_id,
            'status' => 'required|in:aktif,nonaktif',
        ]);

        // Update data user (nama & nis/nip)
        $petugas->user->update([
            'nama' => $request->nama,
            'nis'  => $request->nip,
        ]);

        // Update status di tabel petugas
        $petugas->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin.data-petugas')->with('success', 'Data petugas berhasil diperbarui');
    }



    public function destroy(Petugas $petugas)
    {
        $petugas->delete();

        return redirect()->route('admin.data-petugas')->with('success', 'Data petugas berhasil dihapus');
    }
}
