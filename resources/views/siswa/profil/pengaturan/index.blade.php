<x-app-layout>
    <div class="max-w-4xl mx-auto hidden md:hidden">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">
            Pengaturan Profil
        </h1>

        <div class="grid gap-6 md:grid-cols-2">
            <!-- Pengaturan Password -->
            <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow">
                <h2 class="text-lg font-semibold text-[#5482B3] mb-3">
                    Ubah Password
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                    Atur ulang kata sandi akun Anda untuk keamanan.
                </p>
                <a href="{{ route('siswa.profil.pengaturan.password.edit') }}"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Ubah Password
                </a>
            </div>

            <!-- Mode Warna (Light/Dark) -->
            <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow">
                <h2 class="text-lg font-semibold text-[#5482B3] mb-3">
                    Mode Warna
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                    Pilih tampilan aplikasi dalam mode terang atau gelap.
                </p>
                <button type="button" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700">
                    Ganti Mode
                </button>
            </div>

            <!-- Pengaturan Font -->
            <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow">
                <h2 class="text-lg font-semibold text-[#5482B3] mb-3">
                    Gaya Font
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                    Sesuaikan jenis font untuk tampilan aplikasi.
                </p>
                <select class="w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white">
                    <option value="default">Default</option>
                    <option value="serif">Serif</option>
                    <option value="sans">Sans-serif</option>
                    <option value="mono">Monospace</option>
                </select>
            </div>

            <!-- Placeholder untuk pengaturan lain -->
            <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow">
                <h2 class="text-lg font-semibold text-[#5482B3] mb-3">
                    Notifikasi
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                    (Coming soon) Atur preferensi notifikasi aplikasi.
                </p>
                <button class="px-4 py-2 bg-gray-400 text-white rounded-lg cursor-not-allowed">
                    Belum Tersedia
                </button>
            </div>
        </div>
    </div>

    {{-- mobile --}}
    <div class="md:hiden">
        <div class="w-full h-[70px] bg-[#5482B3] rounded-b-[30px] p-6 text-center text-white">
            <h1 class="text-2xl font-bold mb-6 text-[#052356]">
                Pengaturan Profil 
            </h1>
        </div>

        <div class="grid gap-6 md:grid-cols-2 mt-6 bg-[#E8EDEF] p-4 rounded-md">
            <!-- Pengaturan Password -->
            <div class="p-6 rounded-lg shadow hover:shadow-md">
                <h2 class="text-lg font-semibold text-[#5482B3] mb-3">
                    Ubah Password
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                    Atur ulang kata sandi akun Anda untuk keamanan.
                </p>
                <a href="{{ route('siswa.profil.pengaturan.password.edit') }}"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Ubah Password
                </a>
            </div>

            <!-- Mode Warna (Light/Dark) -->
            <div class="p-6 bg-[#E8EDEF] rounded-lg shadow hover:shadow">
                <h2 class="text-lg font-semibold text-[#5482B3] mb-3">
                    Mode Warna
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                    Pilih tampilan aplikasi dalam mode terang atau gelap.
                </p>
                <button type="button" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700">
                    Ganti Mode
                </button>
            </div>

            <!-- Pengaturan Font -->
            <div class="p-6 bg-[#E8EDEF] rounded-lg shadow hover:shadow">
                <h2 class="text-lg font-semibold text-[#5482B3] mb-3">
                    Gaya Font
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                    Sesuaikan jenis font untuk tampilan aplikasi.
                </p>
                <select class="w-full rounded-lg border-gray-300 bg-[#E8EDEF]">
                    <option value="default">Default</option>
                    <option value="serif">Serif</option>
                    <option value="sans">Sans-serif</option>
                    <option value="mono">Monospace</option>
                </select>
            </div>

            <!-- Placeholder untuk pengaturan lain -->
            <div class="p-6 bg-[#E8EDEF] rounded-lg shadow hover:shadow">
                <h2 class="text-lg font-semibold text-[#5482B3] mb-3">
                    Notifikasi
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                    (Coming soon) Atur preferensi notifikasi aplikasi.
                </p>
                <button class="px-4 py-2 bg-gray-400 text-white rounded-lg cursor-not-allowed">
                    Belum Tersedia
                </button>
            </div>
        </div>
    </div>
</x-app-layout>
