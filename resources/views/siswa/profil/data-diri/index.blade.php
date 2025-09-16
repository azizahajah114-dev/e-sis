<x-app-layout>
    <div class="max-w-3xl mx-auto hidden md:block">
        <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-200">
            Data Diri
        </h1>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 space-y-4">
            <div>
                <p class="text-sm text-gray-500">Nama</p>
                <p class="font-semibold text-gray-800 dark:text-gray-200">{{ $user->nama }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">NIS</p>
                <p class="font-semibold text-gray-800 dark:text-gray-200">{{ $user->nis }}</p>
            </div>
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
                <p class="font-semibold text-gray-800 dark:text-gray-200">{{ $siswa?->jurusan?->nama_jurusan ?? '-' }}</p>
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ route('siswa.profil.data-diri.edit') }}"
               class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                Ubah Data Diri
            </a>
        </div>
    </div>

    {{-- MOBILE --}}
    <div class="md:hidden">
        <div class=" w-full h-[70px] bg-[#5482B3] rounded-b-[20px] p-6 text-center text-white">
            <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-200">
            Data Diri
        </h1>
        </div>

        <div class="bg-[#E8EDEF] rounded-lg shadow p-6 space-y-4 mt-6">
            <div>
                <p class="text-md text-[#0F2D5F] font-bold">Nama</p>
                <p class="font-semibold text-[#052356]">{{ $user->nama }}</p>
            </div>
            <div>
                <p class="text-md text-[#0F2D5F] font-bold">NIS</p>
                <p class="font-semibold text-[#052356]">{{ $user->nis }}</p>
            </div>
            <div>
                <p class="text-md text-[#0F2D5F] font-bold">Tempat, Tanggal Lahir</p>
                <p class="font-semibold text-[#052356]">
                    {{ $siswa?->tempat_lahir ?? '-' }}, 
                    {{ $siswa?->tanggal_lahir ? \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d M Y') : '-' }}
                </p>
            </div>
            <div>
                <p class="text-md text-[#0F2D5F] font-bold">Jenis Kelamin</p>
                <p class="font-semibold text-[#052356]">{{ $siswa?->jenis_kelamin ?? '-' }}</p>
            </div>
            <div>
                <p class="text-md text-[#0F2D5F] font-bold">Nomor HP</p>
                <p class="font-semibold text-[#052356]">{{ $siswa?->nomor_hp ?? '-' }}</p>
            </div>
            <div>
                <p class="text-md text-[#0F2D5F] font-bold">Kelas</p>
                <p class="font-semibold text-[#052356]">{{ $siswa?->kelas?->nama_kelas ?? '-' }}</p>
            </div>
            <div>
                <p class="text-md text-[#0F2D5F] font-bold">Jurusan</p>
                <p class="font-semibold text-[#052356]">{{ $siswa?->jurusan?->nama_jurusan ?? '-' }}</p>
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
