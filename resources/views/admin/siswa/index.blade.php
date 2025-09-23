<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Data Siswa Lengkap</h1>

        {{-- Notifikasi sukses --}}
        @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        {{-- Input Pencarian --}}
        <div class="flex items-center mb-4">
            <i data-lucide="search" class="w-5 h-5 mr-2 text-gray-500"></i>
            <input type="text" id="search" placeholder="Cari nama siswa..."
                class="border border-gray-300 rounded px-3 py-2 w-1/3 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <a href="{{ route('admin.form-tambah-siswa') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mb-4 inline-block">
            + Tambah Siswa
        </a>

        <table class="w-full border border-gray-300 bg-white shadow-lg text-black">
            <thead class="text-black bg-[#017BFA]">
                <tr>
                    <th class="border px-2 py-1">#</th>
                    <th class="border px-2 py-1">Nama</th>
                    <th class="border px-2 py-1">Kelas</th>
                    <th class="border px-2 py-1">Jurusan</th>
                    <th class="border px-2 py-1">Tempat, Tanggal Lahir</th>
                    <th class="border px-2 py-1">Jenis Kelamin</th>
                    <th class="border px-2 py-1">Nomor HP</th>
                    <th class="border px-2 py-1">Aksi</th>
                </tr>
            </thead>
            <tbody id="siswa-table">
                @forelse($siswaLengkap as $index => $siswa)
                <tr>
                    <td class="border px-2 py-1">{{ $index + 1 }}</td>
                    <td class="border px-2 py-1">{{ $siswa->nama }}</td>
                    <td class="border px-2 py-1">
                        {{ optional(optional($siswa->siswaLengkap)->kelas)->nama_kelas ?? '-' }}</td>
                    <td class="border px-2 py-1">
                        {{ optional(optional($siswa->siswaLengkap)->jurusan)->nama_jurusan ?? '-' }}</td>
                    <td class="border px-2 py-1">
                        @if($siswa->siswaLengkap)
                        {{ $siswa->siswaLengkap->tempat_lahir ?? '-' }},
                        {{ $siswa->siswaLengkap->tanggal_lahir ?? '-' }}
                        @else
                        -
                        @endif
                    </td>
                    <td class="border px-2 py-1">{{ optional($siswa->siswaLengkap)->jenis_kelamin ?? '-' }}</td>
                    <td class="border px-2 py-1">{{ optional($siswa->siswaLengkap)->nomor_hp ?? '-' }}</td>
                    <td class="border px-2 py-1">
                        <form action="{{ route('admin.siswa.destroy', $siswa->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus akun + biodata siswa ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                Hapus
                            </button>
                        </form>

                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="7" class="border px-2 py-2 text-center">Belum ada data siswa</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Script pencarian --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // lucide.createIcons();

            const searchInput = document.getElementById("search");
            const tableBody = document.getElementById("siswa-table");

            searchInput.addEventListener("keyup", function () {
                let query = this.value;

                fetch(`{{ route('admin.siswa.search') }}?q=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        tableBody.innerHTML = "";

                        if (data.length === 0) {
                            tableBody.innerHTML = `
                                <tr>
                                    <td colspan="7" class="border px-2 py-2 text-center">Data tidak ditemukan</td>
                                </tr>
                            `;
                        } else {
                            data.forEach((siswa, index) => {
                                tableBody.innerHTML += `
                                    <tr>
                                        <td class="border px-2 py-1">${index + 1}</td>
                                        <td class="border px-2 py-1">${siswa.nama}</td>
                                        <td class="border px-2 py-1">${siswa.kelas ?? '-'}</td>
                                        <td class="border px-2 py-1">${siswa.jurusan ?? '-'}</td>
                                        <td class="border px-2 py-1">${siswa.tempat_lahir ?? '-'}, ${siswa.tanggal_lahir ?? '-'}</td>
                                        <td class="border px-2 py-1">${siswa.jenis_kelamin ?? '-'}</td>
                                        <td class="border px-2 py-1">${siswa.nomor_hp ?? '-'}</td>
                                    </tr>
                                `;
                            });
                        }
                    });
            });
        });

    </script>
</x-app-layout>
