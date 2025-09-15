<x-app-layout>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4 text-white">Data Wali Kelas</h2>

        <a href="{{ route('admin.form-tambah-walikelas') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Tambah Wali Kelas</a>

        @if(session('success'))
            <div class="mt-4 p-2 bg-green-500 text-white rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full mt-4 border text-white">
            <thead class="text-black">
                <tr class="bg-gray-200">
                    <th class="p-2 border">No</th>
                    <th class="p-2 border">Nama Wali Kelas</th>
                    <th class="p-2 border">No HP</th>
                    <th class="p-2 border">Kelas</th>
                    <th class="p-2 border">Status</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($walikelas as $index => $w)
                    <tr>
                        <td class="p-2 border">{{ $index+1 }}</td>
                        <td class="p-2 border">{{ $w->nama_walikelas }}</td>
                        <td class="p-2 border">{{ $w->nomor_hp }}</td>
                        <td class="p-2 border">{{ $w->kelas->nama_kelas }}</td>
                        <td class="p-2 border">{{ ucfirst($w->status) }}</td>
                        <td class="p-2 border space-x-2">
                            <a href="{{ route('admin.form-edit-walikelas', $w->id) }}" class="px-2 py-1 bg-yellow-500 text-white rounded">Edit</a>
                            <form action="{{ route('admin.walikelas.destroy', $w->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="px-2 py-1 bg-red-600 text-white rounded"
                                    onclick="return confirm('Yakin ingin hapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
