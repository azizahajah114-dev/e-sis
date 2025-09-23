<x-app-layout>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4 text-black">Data Wali Kelas</h2>

        {{-- Input pencarian --}}
        <div class="flex items-center mb-4">
            <i data-lucide="search" class="w-5 h-5 mr-2 text-gray-500"></i>
            <input type="text" id="search-walikelas" placeholder="Cari nama wali kelas..."
                   class="border border-gray-300 rounded px-3 py-2 w-1/3 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <a href="{{ route('admin.form-tambah-walikelas') }}" class="px-4 py-2 bg-blue-600 text-white rounded">
            Tambah Wali Kelas
        </a>

        @if(session('success'))
            <div class="mt-4 p-2 bg-green-500 text-white rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full mt-4 border text-black bg-white shadow-lg">
            <thead class="text-black bg-[#017BFA]">
                <tr>
                    <th class="p-2 border">No</th>
                    <th class="p-2 border">Nama Wali Kelas</th>
                    <th class="p-2 border">No HP</th>
                    <th class="p-2 border">Kelas</th>
                    <th class="p-2 border">Status</th>
                    <th class="p-2 border">Foto Walikelas</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody id="walikelas-table">
                @foreach($walikelas as $index => $w)
                    <tr>
                        <td class="p-2 border text-center">{{ $index+1 }}</td>
                        <td class="p-2 border">{{ $w->nama_walikelas }}</td>
                        <td class="p-2 border">{{ $w->nomor_hp }}</td>
                        <td class="p-2 border">{{ $w->kelas->nama_kelas }}</td>
                        <td class="p-2 border">{{ ucfirst($w->status) }}</td>
                        <td class="p-2 border text-center">
                            @if($w->foto)
                                <img src="{{ asset('storage/' . $w->foto) }}"
                                     alt="Foto {{ $w->nama_walikelas }}"
                                     class="w-16 h-16 object-cover rounded-md mx-auto">
                            @else
                                <span class="text-gray-400 italic">Tidak ada foto</span>
                            @endif
                        </td>
                        <td class="p-2 border space-x-2 text-center">
                            <a href="{{ route('admin.form-edit-walikelas', $w->id) }}"
                               class="px-2 py-1 bg-yellow-500 text-white rounded">Edit</a>
                            <form action="{{ route('admin.walikelas.destroy', $w->id) }}"
                                  method="POST"
                                  class="inline">
                                @csrf @method('DELETE')
                                <button type="submit"
                                        class="px-2 py-1 bg-red-600 text-white rounded"
                                        onclick="return confirm('Yakin ingin hapus data ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Script pencarian realtime --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("search-walikelas");
            const tableBody = document.getElementById("walikelas-table");

            searchInput.addEventListener("keyup", function() {
                let query = this.value;

                fetch(`{{ route('admin.walikelas.search') }}?q=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        tableBody.innerHTML = "";

                        if (data.length === 0) {
                            tableBody.innerHTML = `
                                <tr>
                                    <td colspan="7" class="p-2 border text-center">Data tidak ditemukan</td>
                                </tr>
                            `;
                        } else {
                            data.forEach((w, index) => {
                                tableBody.innerHTML += `
                                    <tr>
                                        <td class="p-2 border text-center">${index + 1}</td>
                                        <td class="p-2 border">${w.nama_walikelas}</td>
                                        <td class="p-2 border">${w.nomor_hp}</td>
                                        <td class="p-2 border">${w.kelas ?? '-'}</td>
                                        <td class="p-2 border">${w.status}</td>
                                        <td class="p-2 border text-center">
                                            ${w.foto
                                                ? `<img src="/storage/${w.foto}" class="w-16 h-16 object-cover rounded-md mx-auto">`
                                                : `<span class="text-gray-400 italic">Tidak ada foto</span>`
                                            }
                                        </td>
                                        <td class="p-2 border text-center">
                                            <a href="/admin/walikelas/${w.id}/edit"
                                               class="px-2 py-1 bg-yellow-500 text-white rounded">Edit</a>
                                            <form action="/admin/walikelas/${w.id}" method="POST" class="inline">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                        class="px-2 py-1 bg-red-600 text-white rounded"
                                                        onclick="return confirm('Yakin ingin hapus data ini?')">
                                                    Hapus
                                                </button>
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
