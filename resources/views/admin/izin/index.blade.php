<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4 text-black">Laporan Izin</h1>
        <!-- Input Pencarian -->
        <div class="flex items-center mb-4">
            <i data-lucide="search" class="w-5 h-5 mr-2 text-gray-500"></i>
            <input type="text" id="search-izin" placeholder="Cari nama siswa..."
                class="border border-gray-300 rounded px-3 py-2 w-1/3 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Form Filter -->
        <form method="GET" action="{{ route('admin.izin.index') }}" class="mb-4 flex space-x-4">
            <select name="jurusan_id" class="border rounded p-2">
                <option value="">-- Pilih Jurusan --</option>
                @foreach ($jurusan as $j)
                <option value="{{ $j->id }}" {{ request('jurusan_id') == $j->id ? 'selected' : '' }}>
                    {{ $j->nama_jurusan }}
                </option>
                @endforeach
            </select>

            <select name="kelas_id" class="border rounded p-2">
                <option value="">-- Pilih Kelas --</option>
                @foreach ($kelas as $k)
                <option value="{{ $k->id }}" {{ request('kelas_id') == $k->id ? 'selected' : '' }}>
                    {{ $k->nama_kelas }}
                </option>
                @endforeach
            </select>

            <select name="status_izin" class="border rounded p-2">
                <option value="">-- Pilih Status --</option>
                <option value="menunggu_bukti" {{ request('status_izin') == 'menunggu_bukti' ? 'selected' : '' }}>
                    Menunggu Bukti Lampiran</option>
                <option value="menunggu_validasi" {{ request('status_izin') == 'menunggu_validasi' ? 'selected' : '' }}>
                    Menunggu Validasi Petugas</option>
                <option value="disetujui" {{ request('status_izin') == 'disetujui' ? 'selected' : '' }}>Disetujui
                </option>
                <option value="ditolak" {{ request('status_izin') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>

            <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">Filter</button>
        </form>

        <!-- Tabel Data -->
        <table class="w-full border-collapse border bg-white shadow-lg text-black">
            <thead class="text-black bg-[#017BFA]">
                <tr>
                    <th class="border p-2">Nama Siswa</th>
                    <th class="border p-2">Jurusan</th>
                    <th class="border p-2">Kelas</th>
                    <th class="border p-2">Jenis Izin</th>
                    <th class="border p-2">Keterangan Izin</th>
                    <th class="border p-2">Tanggal</th>
                    <th class="border p-2">Status</th>
                </tr>
            </thead>
            <tbody id="izin-table">
                @foreach ($izin as $i)
                <tr>
                    <td class="border p-2">{{ $i->user->nama }}</td>
                    <td class="border p-2">{{ $i->user->siswaLengkap->jurusan->nama_jurusan ?? '-' }}</td>
                    <td class="border p-2">{{ $i->user->siswaLengkap->kelas->nama_kelas ?? '-' }}</td>
                    <td class="border p-2">{{ ucfirst($i->jenis_izin) }}</td>
                    <td class="border p-2">
                        @if($i->hasil_validasi === 'kembali_sekolah')
                        Siswa kembali lagi ke sekolah
                        @elseif($i->hasil_validasi === 'pulang_rumah')
                        Siswa kembali ke rumah
                        @elseif($i->hasil_validasi === 'izin_lebih_dari_sehari')
                        Siswa izin lebih dari sehari
                        @else
                        -
                        @endif
                    </td>
                    <td class="border p-2">{{ $i->tanggal }}</td>
                    <td class="border p-2">{{ ucfirst($i->status_izin) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Script pencarian realtime --}}
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const searchInput = document.getElementById("search-izin");
                const tableBody = document.getElementById("izin-table");

                searchInput.addEventListener("keyup", function () {
                    let query = this.value;

                    fetch(`{{ route('admin.izin.search') }}?q=${query}`)
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
                                data.forEach(i => {
                                    tableBody.innerHTML += `
                            <tr>
                                <td class="border p-2">${i.nama}</td>
                                <td class="border p-2">${i.jurusan ?? '-'}</td>
                                <td class="border p-2">${i.kelas ?? '-'}</td>
                                <td class="border p-2">${i.jenis_izin}</td>
                                <td class="border p-2">${i.keterangan_izin}</td>
                                <td class="border p-2">${i.tanggal}</td>
                                <td class="border p-2">${i.status_izin}</td>
                            </tr>
                        `;
                                });
                            }
                        });
                });
            });

        </script>

    </div>
</x-app-layout>





<div class="mt-4">
    {{ $izin->links() }}
</div>
