<x-app-layout>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Edit Wali Kelas</h2>

        <form action="{{ route('admin.walikelas.update', $walikelas->id) }}" method="POST" class="space-y-4">
            @csrf @method('PUT')

            <div>
                <label class="block">Nama Wali Kelas</label>
                <input type="text" name="nama_walikelas" class="w-full border p-2 rounded" 
                       value="{{ $walikelas->nama_walikelas }}" required>
            </div>

            <div>
                <label class="block">Kelas</label>
                <select name="kelas_id" class="w-full border p-2 rounded" required>
                    @foreach($kelas as $k)
                        <option value="{{ $k->id }}" {{ $walikelas->kelas_id == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kelas }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block">Status</label>
                <select name="status" class="w-full border p-2 rounded" required>
                    <option value="aktif" {{ $walikelas->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ $walikelas->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
        </form>
    </div>
</x-app-layout>
