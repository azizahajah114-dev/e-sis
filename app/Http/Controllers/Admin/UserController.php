<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Tampilkan semua pengguna (hanya siswa & petugas).
     */
    public function index()
    {
        $users = User::whereIn('role', ['siswa', 'petugas'])->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Tampilkan form tambah pengguna.
     */
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
