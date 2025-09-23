{{-- resources/views/admin/petugas/index.blade.php --}}
<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Data Petugas</h1>

        <a href="{{ route('admin.form-tambah-petugas') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded mb-4 inline-block">
            Tambah Petugas
        </a>

        <div class="overflow-x-auto bg-white shadow-md rounded">
            <table class="min-w-full border text-sm text-left text-black">
                <thead class="bg-[#017BFA]">
                    <tr>
                        <th class="px-4 py-2 border">#</th>
                        <th class="px-4 py-2 border">Nama</th>
                        <th class="px-4 py-2 border">NIP/NIS</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($petugas as $index => $item)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">{{ $item->user->nama ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $item->user->nis ?? '-' }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('admin.form-edit-petugas', $item->id) }}"
                                   class="px-3 py-1 bg-yellow-500 text-white rounded">
                                    Edit
                                </a>
                                <form action="{{ route('admin.petugas.destroy', $item->id) }}"
                                      method="POST" class="inline"
                                      onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-1 bg-red-600 text-white rounded">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-2 text-center text-gray-500">
                                Belum ada data petugas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
