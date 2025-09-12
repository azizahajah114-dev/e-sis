<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Data Siswa Lengkap</h1>

        {{-- Notifikasi sukses --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('admin.form-tambah-siswa') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
            + Tambah Siswa
        </a>

        <table class="w-full border border-gray-300 text-white">
            <thead class="text-black">
                <tr class="bg-gray-200">
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
            <tbody>
                @forelse($siswaLengkap as $index => $siswa)
                    <tr>
                        <td class="border px-2 py-1">{{ $index + 1 }}</td>

                        {{-- Nama dari tabel users --}}
                        <td class="border px-2 py-1">{{ $siswa->nama }}</td>

                        {{-- Data kelas & jurusan pakai optional biar aman --}}
                        <td class="border px-2 py-1">
                            {{ optional(optional($siswa->siswaLengkap)->kelas)->nama_kelas ?? '-' }}
                        </td>
                        <td class="border px-2 py-1">
                            {{ optional(optional($siswa->siswaLengkap)->jurusan)->nama_jurusan ?? '-' }}
                        </td>

                        {{-- Tempat & tanggal lahir --}}
                        <td class="border px-2 py-1">
                            @if($siswa->siswaLengkap)
                                {{ $siswa->siswaLengkap->tempat_lahir ?? '-' }},
                                {{ $siswa->siswaLengkap->tanggal_lahir ?? '-' }}
                            @else
                                -
                            @endif
                        </td>

                        {{-- Jenis kelamin --}}
                        <td class="border px-2 py-1">
                            {{ optional($siswa->siswaLengkap)->jenis_kelamin ?? '-' }}
                        </td>

                        {{-- Nomor HP --}}
                        <td class="border px-2 py-1">
                            {{ optional($siswa->siswaLengkap)->nomor_hp ?? '-' }}
                        </td>

                        {{-- Tombol aksi --}}
                        <td class="border px-2 py-1">
                            @if($siswa->siswaLengkap)
                                <a href="{{ route('admin.form-edit-siswa', $siswa->siswaLengkap->id) }}"
                                   class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>

                                <form action="{{ route('admin.siswa.destroy', $siswa->siswaLengkap->id) }}"
                                      method="POST"
                                      class="inline-block"
                                      onsubmit="return confirm('Hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-600 text-white px-2 py-1 rounded">
                                        Hapus
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('admin.form-tambah-siswa') }}"
                                   class="bg-blue-600 text-white px-2 py-1 rounded">
                                    Lengkapi
                                </a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="border px-2 py-2 text-center">
                            Belum ada data siswa
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
