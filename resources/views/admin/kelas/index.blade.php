<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4 text-black">Daftar Kelas</h1>

        {{-- Input Pencarian --}}
        <div class="flex items-center mb-4">
            <i data-lucide="search" class="w-5 h-5 mr-2 text-gray-500"></i>
            <input type="text" id="search" placeholder="Cari nama kelas..."
                class="border border-gray-300 rounded px-3 py-2 w-1/3 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <a href="{{ route('admin.form-tambah-kelas') }}"
            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">+ Tambah Kelas</a>

        @if(session('success'))
        <div class="mt-4 p-2 bg-green-500 text-white rounded">
            {{ session('success') }}
        </div>
        @endif

        <table class="w-full mt-4 border text-black bg-white shadow-lg">
            <thead class="bg-[#017BFA] text-black">
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Nama Kelas</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody id="kelas-table">
                @foreach($kelas as $k)
                <tr>
                    <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 border">{{ $k->nama_kelas }}</td>
                    <td class="px-4 py-2 border">
                        <a href="{{ route('admin.form-edit-kelas', $k->id) }}"
                            class="px-2 py-1 bg-yellow-500 text-white rounded">Edit</a>
                        <form action="{{ route('admin.kelas.destroy', $k->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus kelas ini?')"
                                class="px-2 py-1 bg-red-600 text-white rounded">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Script Pencarian --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("search");
            const tableBody = document.getElementById("kelas-table");

            searchInput.addEventListener("keyup", function() {
                let query = this.value;

                fetch(`{{ route('admin.kelas.search') }}?q=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        tableBody.innerHTML = "";

                        if (data.length === 0) {
                            tableBody.innerHTML = `
                                <tr>
                                    <td colspan="3" class="border px-2 py-2 text-center">Data tidak ditemukan</td>
                                </tr>
                            `;
                        } else {
                            data.forEach((kelas, index) => {
                                tableBody.innerHTML += `
                                    <tr>
                                        <td class="px-4 py-2 border">${index + 1}</td>
                                        <td class="px-4 py-2 border">${kelas.nama_kelas}</td>
                                        <td class="px-4 py-2 border">
                                            <a href="/admin/kelas/edit/${kelas.id}"
                                               class="px-2 py-1 bg-yellow-500 text-white rounded">Edit</a>
                                            <form action="/admin/kelas/destroy/${kelas.id}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Hapus kelas ini?')"
                                                    class="px-2 py-1 bg-red-600 text-white rounded">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                `;
                            });
                        }
                    });
            });
        });
    </script>
</x-app-layout>
