<x-app-layout>
    <div class="p-6">
        <h1 class="text-xl font-bold mb-4">Edit Petugas</h1>

        <form action="{{ route('admin.petugas.update', $petugas->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            {{-- Nama Petugas --}}
            <div>
                <label for="nama" class="block font-medium">Nama Petugas</label>
                <input type="text" name="nama" id="nama"
                       value="{{ old('nama', $petugas->user->nama) }}"
                       class="w-full border rounded p-2">
                @error('nama')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>

            {{-- NIP --}}
            <div>
                <label for="nip" class="block font-medium">NIP</label>
                <input type="text" name="nip" id="nip"
                       value="{{ old('nip', $petugas->user->nis) }}"
                       class="w-full border rounded p-2">
                @error('nip') 
                    <div class="text-red-600 text-sm">{{ $message }}</div> 
                @enderror
            </div>

            {{-- Status --}}
            <div>
                <label for="status" class="block font-medium">Status</label>
                <select name="status" id="status" class="w-full border rounded p-2">
                    <option value="aktif" {{ old('status', $petugas->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ old('status', $petugas->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @error('status') 
                    <div class="text-red-600 text-sm">{{ $message }}</div> 
                @enderror
            </div>

            {{-- Tombol --}}
            <div>
                <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update</button>
                <a href="{{ route('admin.data-petugas') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
            </div>
        </form>
    </div>
</x-app-layout>
