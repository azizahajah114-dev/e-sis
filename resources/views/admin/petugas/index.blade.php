{{-- resources/views/admin/petugas/index.blade.php --}}
<x-app-layout>
    <div class="hidden md:block">
        <div class="p-6">
            <div>
                <h1 class="text-xl font-bold mb-4 text-[#224779]">Daftar Petugas</h1>
                <hr class="border-1 border-[#224779]">
            </div>

            <div class="flex justify-end mt-6 mb-6">
                <a href="{{ route('admin.form-tambah-petugas') }}"
                    class="inline-flex gap-1 items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-plus-icon lucide-circle-plus"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/>
                        </svg>
                        Tambah
                </a>
            </div>

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
    </div>

    <div class="md:hidden">
        <div class="p-6">
            <h1 class="text-xl font-bold mb-4 text-[#224779] text-center">Data Petugas</h1>
            <hr class="border-1 border-[#224779]">
        </div>

            <div class="flex justify-end px-6">
                <a href="{{ route('admin.form-tambah-petugas') }}"
                class="inline-flex gap-1 items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-plus-icon lucide-circle-plus"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/>
                    </svg>
                    Tambah
                </a>
            </div>

            {{-- <div class="overflow-x-auto bg-white shadow-md rounded">
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
            </div> --}}

            <div class="grid grid-cols-1 gap-6 px-6 mt-6">
                @forelse ($petugas as $index => $item)
                    <div class="bg-white p-4 md:p-6 rounded-xl shadow-lg border-l-4 border-[#017BFA] transition hover:shadow-xl">
                        <div class="flex flex-col justify-between gap-3">
                            <p class="text-lg font-bold text-black"><span>{{ $item->user->nama ?? '-' }}</span></p>
                            <p class="text-md text-gray-800 mt-1">NIP: <span class="font-bold">{{ $item->user->nis ?? '-' }}</span></p>
                        </div>
                        
                        
                        <div class="flex-shrink-0">
                            <p class="text-md font-medium text-gray-600">
                                Status:
                                {{-- Badge Status --}}
                                <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full ml-2
                                    {{ $item->status == 'aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </p>
                        </div>
                        @empty
                        <p class="text-lg font-bold">Belum ada data petugas</p>
                    </div>


                @endforelse
            </div>
    </div>
</x-app-layout>
