<x-app-layout>
    <div class="max-w-4xl mx-auto hidden md:block">
        <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-200">
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

    {{-- mobile --}}
    <div class="md:hidden">
        <div class="bg-[#5F9EF2] w-full h-[70px] rounded-b-lg p-6 text-center fixed top-0 right-0 left-0 text-white flex">
            <a href="{{route("siswa.profil")}}">
                <div class="absolute">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left-icon lucide-chevron-left"><path d="m15 18-6-6 6-6"/></svg>
                </div>
            </a>
            <h1 class="absolute left-1/2 -translate-x-1/2 text-xl font-bold text-white">
                Pengaturan Profil
            </h1>
        </div>
        
        <div class="mt-10 space-y-3 bg-white p-4 rounded-md">
            <!-- Mode Warna (Light/Dark) -->
            <div class="block px-6 py-4  rounded-xl shadow hover:shadow-md transition">
                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                    class="lucide lucide-sun-icon lucide-sun "><circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/>
                    <path d="M20 12h2"/><path d="m6.34 17.66-1.41 1.41"/><path d="m19.07 4.93-1.41 1.41"/>
                </svg> --}}
                <h2 class="text-lg font-semibold text-[#5482B3]">
                    Mode Warna
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                    Pilih tampilan aplikasi dalam mode terang atau gelap.
                </p>
                <button type="button" class="px-4 py-2 bg-[#5482B3] text-white rounded-lg hover:bg-[#456f9b]">
                    Ganti Mode
                </button>
            </div>

            <!-- Pengaturan Font -->
            <div class="block px-6 py-4  rounded-xl shadow hover:shadow-md transition">
                <h2 class="text-lg font-semibold text-[#5482B3]">
                    Gaya Font
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                    Sesuaikan jenis font untuk tampilan aplikasi.
                </p>
                <select class="w-full rounded-lg border-gray-300 bg-[#E8EDEF] text-[#052356]">
                    <option value="default">Default</option>
                    <option value="serif">Serif</option>
                    <option value="sans">Sans-serif</option>
                    <option value="mono">Monospace</option>
                </select>
            </div>

            <!-- Placeholder untuk pengaturan lain -->
            <div class="block px-6 py-4  rounded-xl shadow hover:shadow-md transition">
                <h2 class="text-lg font-semibold text-[#5482B3]">
                    Notifikasi
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                    (Coming soon) Atur preferensi notifikasi aplikasi.
                </p>
                <button class="px-4 py-2 bg-[#5482B3] text-white rounded-lg hover:bg-[#456f9b] cursor-not-allowed">
                    Belum Tersedia
                </button>
            </div>
        </div>
    </div>
</x-app-layout>
