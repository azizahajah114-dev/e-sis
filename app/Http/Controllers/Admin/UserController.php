<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Kelas;
use App\Http\Controllers\Controller;
use App\Imports\UserImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{

    public function index()
    {
        $kelas = Kelas::all();
        return view('admin.users.index', compact('kelas'));
    }


    public function byKelas($id)
    {
        $kelas = Kelas::findOrFail($id);
        $users = User::where('kelas_id', $id)->get();

        return view('admin.users.byKelas', compact('users', 'kelas'));
    }

    public function import(Request $request, $kelasId)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls'
        ]);

        // Import tanpa kelas_id
        Excel::import(new UserImport, $request->file('file'));

        return redirect()->route('admin.data-pengguna.kelas', $kelasId)
            ->with('success', 'Data berhasil diimport!');
    }

    public function importGlobal(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls'
        ]);

        Excel::import(new UserImport, $request->file('file'));

        return redirect()->route('admin.data-pengguna')
            ->with('success', 'Data berhasil diimport!');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Simpan pengguna baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|unique:users,nis',
            'password' => 'required|string|min:6',
            'role' => 'required|in:siswa,petugas',
        ]);

        User::create([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.data-pengguna')->with('success', 'Pengguna berhasil ditambahkan');
    }

    /**
     * Tampilkan form edit pengguna.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update data pengguna.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|unique:users,nis,' . $user->id,
            'role' => 'required|in:siswa,petugas',
        ]);

        $data = $request->only(['nama', 'nis', 'role']);
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.data-pengguna')->with('success', 'Pengguna berhasil diperbarui');
    }

    /**
     * Hapus pengguna.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.data-pengguna')->with('success', 'Pengguna berhasil dihapus');
    }
}
