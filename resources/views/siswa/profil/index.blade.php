<x-app-layout>
    <div class="max-w-3xl mx-auto">
        <div class="hidden md:block">
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
                            class="w-full px-6 py-3 border border-red-700 hover:bg-red-600 text-red-600 hover:text-white rounded-lg shadow transition">
                        <i class="bi bi-box-arrow-right"></i>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    

        {{-- ini versi mobile --}}
        <div class="md:hidden w-full overflow-x-auto">
             <div class="w-full h-[165px] bg-[#5482B3] rounded-b-[30px] p-6 text-center text-white">
                <h1 class=" font-bold mb-6 text-[#052356]">
                    Profil Siswa
                </h1>
                <img src="" class="w-20 h-20 mx-auto mt-6 rounded-full border-4 border-white" alt="foto siswa">
                <h2 class="mt-3 font-semibold text-lg text-[#356676]">Budi Utomo</h2>
            </div>

            <div class="mt-10 space-y-3 bg-[#E8EDEF] p-4 rounded-md">
                <!-- Data Diri -->
                <a href="{{ route('siswa.profil.data-diri') }}"
                class="block px-6 py-4 rounded-xl shadow hover:shadow-md">
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-gear text-[#73A5D9] text-xl bg-[#C3D8F0] rounded-full p-1" viewBox="0 0 16 16">
                            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m.256 7a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
                        </svg>
                        <h2 class="text-lg font-semibold text-[#5482B3]">Data Diri</h2>
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                        </svg>
                    </div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Lihat dan ubah informasi biodata diri.
                        </p> 
                        <hr class=" h-px bg-[#224779] border-0">
                </a>

                <!-- Pengaturan -->
                <a href="{{ route('siswa.profil.pengaturan') }}"
                class="block px-6 py-4  rounded-xl shadow hover:shadow-md transition">
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-gear text-[#73A5D9] text-xl bg-[#C3D8F0] rounded-full p-1" viewBox="0 0 16 16">
                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0"/>
                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z"/>
                        </svg>
                        <h2 class="text-lg font-semibold text-[#5482B3]">Pengaturan</h2>
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                        </svg>
                    </div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Ubah password, mode tampilan dll.
                    </p>
                    <hr class="h-px bg-[#224779] border-0">
                </a>

                <!-- Wali Kelas -->
                <a href="{{ route('siswa.profil.walikelas') }}"
                class="block px-6 py-4  rounded-xl shadow hover:shadow-md transition">
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-whatsapp text-[#73A5D9] text-xl bg-[#C3D8F0] rounded-full p-1" viewBox="0 0 16 16">
                            <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                        </svg>
                        <h2 class="text-lg font-semibold text-[#5482B3]">Wali Kelas</h2>
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                        </svg>
                    </div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Lihat detail wali kelas Anda.
                    </p>
                    <hr class="h-px bg-[#224779] border-0">
                </a>
            </div>

            <!-- Logout -->
            <div class="mt-8">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="w-full px-6 py-3 border border-red-700 hover:bg-red-600 text-red-600 hover:text-white rounded-lg shadow transition">
                        <i class="bi bi-box-arrow-right"></i>
                        Logout
                    </button>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>
