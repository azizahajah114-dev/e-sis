<x-app-layout>
    <div class="max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-200">
            Profil Siswa
        </h1>

        <div class="grid gap-4">
            <!-- Data Diri -->
            <a href="{{ route('siswa.profil.data-diri') }}"
               class="block px-6 py-4 bg-white dark:bg-gray-800 rounded-xl shadow hover:shadow-md transition">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Data Diri</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Lihat dan ubah informasi biodata diri seperti tanggal lahir, kelas, jurusan, dll.
                </p>
            </a>

            <!-- Pengaturan -->
            <a href="{{ route('siswa.profil.pengaturan') }}"
               class="block px-6 py-4 bg-white dark:bg-gray-800 rounded-xl shadow hover:shadow-md transition">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Pengaturan</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Ubah password, mode tampilan aplikasi, font, dan pengaturan lainnya.
                </p>
            </a>

            <!-- Wali Kelas -->
            <a href="{{ route('siswa.profil.walikelas') }}"
               class="block px-6 py-4 bg-white dark:bg-gray-800 rounded-xl shadow hover:shadow-md transition">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Wali Kelas</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Lihat detail wali kelas Anda atau pilih wali kelas jika belum ditentukan.
                </p>
            </a>
        </div>

        <!-- Logout -->
        <div class="mt-8">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full px-6 py-3 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 transition">
                    Logout
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
