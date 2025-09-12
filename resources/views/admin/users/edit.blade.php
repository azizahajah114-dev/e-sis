<x-app-layout>
    <div class="max-w-2xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6 text-white">Edit Pengguna</h1>

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-medium">Nama</label>
                <input type="text" name="nama" value="{{ old('nama', $user->nama) }}" 
                       class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300">
                @error('nama') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">NIS</label>
                <input type="text" name="nis" value="{{ old('nis', $user->nis) }}" 
                       class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300">
                @error('nis') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Password (Opsional)</label>
                <input type="password" name="password" 
                       class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300">
                <p class="text-sm text-gray-500">Kosongkan jika tidak ingin mengganti password.</p>
                @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Role</label>
                <select name="role" class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300">
                    <option value="siswa" {{ old('role', $user->role) == 'siswa' ? 'selected' : '' }}>Siswa</option>
                    <option value="petugas" {{ old('role', $user->role) == 'petugas' ? 'selected' : '' }}>Petugas</option>
                </select>
                @error('role') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-between">
                <a href="{{ route('admin.data-pengguna') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                    Kembali
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
