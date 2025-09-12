<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4 text-white">Daftar Jurusan</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('admin.form-tambah-jurusan') }}" 
           class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
            + Tambah Jurusan
        </a>

        <table class="w-full border border-gray-300 text-white">
            <thead class="bg-gray-200 text-black">
                <tr>
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Nama Jurusan</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jurusan as $item)
                    <tr>
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $item->nama_jurusan }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('admin.form-edit-jurusan', $item->id) }}" 
                               class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>

                            <form action="{{ route('admin.jurusan.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-500 text-white px-3 py-1 rounded"
                                        onclick="return confirm('Yakin hapus data ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-3">Belum ada data jurusan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
