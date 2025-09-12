<x-app-layout>
    <div class="p-6">
        <h1 class="text-xl font-bold mb-4">Tambah Petugas</h1>

        <form action="{{ route('admin.petugas.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="user_id" class="block font-medium">Pilih User</label>
                <select name="user_id" id="user_id" class="w-full border rounded p-2">
                    <option value="">-- Pilih Petugas --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->nama }}
                        </option>
                    @endforeach
                </select>
                @error('user_id') 
                    <div class="text-red-600 text-sm">{{ $message }}</div> 
                @enderror
            </div>

            <div>
                <label for="nip" class="block font-medium">NIP</label>
                <input type="text" name="nip" id="nip" value="{{ old('nip') }}"
                       class="w-full border rounded p-2">
                @error('nip') 
                    <div class="text-red-600 text-sm">{{ $message }}</div> 
                @enderror
            </div>

            <div>
                <label for="status" class="block font-medium">Status</label>
                <select name="status" id="status" class="w-full border rounded p-2">
                    <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @error('status') 
                    <div class="text-red-600 text-sm">{{ $message }}</div> 
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                <a href="{{ route('admin.data-petugas') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
            </div>
        </form>
    </div>
</x-app-layout>
