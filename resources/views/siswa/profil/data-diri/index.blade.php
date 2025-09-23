<x-app-layout>
    <div class="max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-200">
            Data Diri
        </h1>

        <div class="flex items-center gap-4">
            <div>
                @if ($user->foto)
                <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto Profil"
                    class="w-24 h-24 rounded-full object-cover">
                @else
                <div class="w-24 h-24 rounded-full bg-gray-300 flex items-center justify-center">
                    <span class="text-gray-600">No Foto</span>
                </div>
                @endif
            </div>
            <div>
                <p class="text-xl font-bold text-gray-800 dark:text-gray-200">{{ $user->nama }}</p>
                <p class="text-gray-500">{{ $user->nis }}</p>
            </div>
        </div>


        <div class="bg-white dark:bg-gray-800 rounded-lg mt-8 shadow p-6 space-y-4">
            {{--<div>
                <p class="text-sm text-gray-500">Nama</p>
                <p class="font-semibold text-gray-800 dark:text-gray-200">{{ $user->nama }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">NIS</p>
                <p class="font-semibold text-gray-800 dark:text-gray-200">{{ $user->nis }}</p>
            </div> --}}
            <div>
                <p class="text-sm text-gray-500">Tempat, Tanggal Lahir</p>
                <p class="font-semibold text-gray-800 dark:text-gray-200">
                    {{ $siswa?->tempat_lahir ?? '-' }},
                    {{ $siswa?->tanggal_lahir ? \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d M Y') : '-' }}
                </p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Jenis Kelamin</p>
                <p class="font-semibold text-gray-800 dark:text-gray-200">{{ $siswa?->jenis_kelamin ?? '-' }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Nomor HP</p>
                <p class="font-semibold text-gray-800 dark:text-gray-200">{{ $siswa?->nomor_hp ?? '-' }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Kelas</p>
                <p class="font-semibold text-gray-800 dark:text-gray-200">{{ $siswa?->kelas?->nama_kelas ?? '-' }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Jurusan</p>
                <p class="font-semibold text-gray-800 dark:text-gray-200">{{ $siswa?->jurusan?->nama_jurusan ?? '-' }}
                </p>
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ route('siswa.profil.data-diri.edit') }}"
                class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                Ubah Data Diri
            </a>
        </div>
    </div>
</x-app-layout>
