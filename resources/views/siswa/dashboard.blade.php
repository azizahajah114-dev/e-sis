<x-app-layout>  
    <div class="md:hidden">
        <div class="flex justify-between items-center ">
            <div class="flex flex-row items-center  gap-2">
                <img src="" class="w-8 h-8 mx-auto  rounded-full border-4 border-white" alt="foto siswa">
                <span class="text-center py-2">Budi Utomo</span>
            </div>
            <hr class="border-b-2 border-[#224779]">
            {{-- notifikasi di mobile --}}
            <div class="relative mt-2">
                <button id="notifikasi-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bell-icon lucide-bell"><path d="M10.268 21a2 2 0 0 0 3.464 0"/><path d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"/>
                    </svg>
                </button>
                {{-- dummy --}}
                <div id="notifikasi-dropdown" class="bg-white shadow-md w-80 absolute right-0 mt-2 rounded-md hidden">
                    <div class="p-4 border-b">
                        <h3 class="font-semibold text-gray-800">Notifikasi</h3>
                    </div>
                    <div class="p-2 space-y-2">
                        <a href="#" class="block p-2 w-full bg-slate-200 rounded-lg hover:bg-slate-300 transition duration-150 ease-in-out">
                            <div class="flex items-center space-x-2">
                                <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                                <div>
                                    <p class="text-md font-medium text-gray-900">Hai Budi Utomo</p>
                                    <p class="mt-1 text-sm font-medium text-gray-600">Izin telah divalidasi</p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="block p-2 w-full bg-slate-200 rounded-lg hover:bg-slate-300 transition duration-150 ease-in-out">
                            <div class="flex items-center space-x-2">
                                <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                                <div>
                                    <p class="text-md font-medium text-gray-900">Hai Budi Utomo</p>
                                    <p class="mt-1 text-sm font-medium text-gray-600">Izin telah divalidasi</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-t">
                        <a href="#" class="block text-sm text-end text-blue-600 hover:text-blue-800">Lihat Lainnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- section 1  --}}
    <div class="container mx-auto p-4 mt-3">
        <div class="bg-[#568EDA] rounded-2xl p-8 shadow-lg ">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-8 md:space-y-0 md:space-x-8">
                {{-- Teks dan Tombol --}}
                <div class="flex flex-col text-white text-center md:text-left flex-1">
                    <h1 class="text-lg md:text-3xl font-bold mb-2">Halo, {{ Auth::user()->nama }}  Selamat Datang👋 </h1>
                    <p class="text-sm text-start md:text-lg font-light mb-4 ">
                        Mengajukan izin kini lebih praktis & transparan
                    </p>
                </div>

                {{-- Ilustrasi Atas --}}
                <div class="flex-shrink-0 right-0 left-0">
                    <img src="{{ asset('storage/asset/forms-animate.svg') }}" alt="Ilustrasi Selamat Datang" class="w-24 max-w-xs md:max-w-xs">
                </div>
            </div>
        </div>
    </div>

    {{-- section 2 tentang e-sis--}}
    <div class="container mx-auto p-4 mt-2">
        <div class="bg-[#568EDA] rounded-2xl p-8 shadow-lg">
            <div class="flex flex-col md:flex-row items-center md:justify-between space-y-8 md:space-y-0 md:space-x-8">
                <div class=" hidden md:block">
                    <img src="{{ asset('storage/asset/undraw_pair-programming_9jyg.svg') }}" alt="Ilustrasi Tentang Kami" class="w-48 max-w-xs md:max-w-md">
                </div>

                <div class="flex flex-col text-white text-left md:text-left">
                    <h1 class="text-white text-2xl md:text-3xl font-bold mb-4">Tentang e-SIS</h1>
                    <p class="text-md md:text-lg font-light">
                        E-SIS (Elektronik Surat Izin Sekolah) adalah aplikasi berbasis web yang dirancang untuk memudahkan proses pengajuan izin siswa secara digital, aman, dan terintegrasi dengan sekolah.
                    </p>
                    <p class="text-md md:text-lg font-light mt-4">
                        Aplikasi ini dibuat oleh Aji Pamungkas dan Azizah Hajar siswa dari Kelas XI RPL 2, dengan tujuan utama mendigitalisasi alur izin sekolah agar lebih efisien, transparan, dan ramah lingkungan.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- section 4  panduan --}}
    <div class="container mx-auto p-4 mt-8">
        <div class="bg-[#568EDA] rounded-2xl p-8 shadow-lg">
            <h1 class="text-white text-center text-xl md:text-4xl font-bold mb-4">Panduan Praktis Mengajukan</h1>

            {{-- card --}}
            <div class="flex flex-wrap -mx-2">
                {{-- data diri --}}
                <div class="w-full sm:w-1/2 px-2 mb-4">
                <div class="bg-[#5F9EF2] rounded-lg p-6 flex items-center justify-between text-white"> 
                     <div class="flex-1 pr-4">
                        <h1 class="text-xl md:text-2xl font-semibold mb-2">
                            <span class="inline-flex items-center justify-center bg-white text-[#5F9EF2] font-semibold w-8 h-8 rounded-full">1</span> 
                            Lengkapi Data Diri</h1>
                        <p class="text-md text-gray-800">Sebelum mengajukan izin, pastikan siswa sudah mengisi data diri lengkap pada menu Profil Siswa.</p>
                        <p class="text-md text-red-600">📌 Tanpa data diri yang lengkap, siswa tidak dapat mengajukan izin.</p>
                    </div>
                    <div class="flex-shrink-0 hidden md:block">
                        <img src="{{asset('storage/asset/Account-cuate.svg')}}" alt="Mengisi Data Diri" class="w-20 md:w-40"> 
                    </div>
                </div>
            </div>

            {{-- form izin --}}
            <div class="w-full sm:w-1/2 px-2 mb-4">
                <div class="bg-[#5F9EF2] rounded-lg p-6 flex items-center justify-between text-white"> 
                    <div class="flex-1 pr-4"> 
                        <h1 class="text-xl md:text-2xl font-semibold mb-2">
                             <span class="inline-flex items-center justify-center bg-white text-[#5F9EF2] font-semibold w-8 h-8 rounded-full">2</span> 
                            Mengisi Form Izin</h1> 
                        <p class="text-md text-gray-800">Setelah data lengkap, siswa dapat mengajukan izin dengan langkah berikut:</p>
                        <ul class="text-md text-white list-disc list-inside">
                            <li>Pilih jenis izin: Sakit / Izin</li>
                            <li>Isi alasan dan keterangan (misalnya: kembali ke sekolah atau langsung pulang ke rumah)</li>
                            <li>Isi jam keluar sesuai dengan waktu izin.</li>
                        </ul>
                    </div>
                    <div class="flex-shrink-0 hidden md:block"> 
                        <img src="{{asset('storage/asset/Forms-cuate.svg')}}" alt="Mengisi Data Diri" class="w-24 md:w-40"> 
                    </div>
                </div>
            </div>
                
            {{-- QR Code --}}
            <div class="w-full sm:w-1/2 px-2 mb-4">
                <div class="bg-[#5F9EF2] rounded-lg p-6 flex items-center justify-between text-white">
                    <div class="flex-1 pr-4">
                        <h1 class="text-xl md:text-2xl font-semibold mb-2">
                             <span class="inline-flex items-center justify-center bg-white text-[#5F9EF2] font-semibold w-8 h-8 rounded-full">3</span> 
                            Scan QR Code</h1>
                        <p class="text-md text-gray-800 mt-2">Setelah formulir izin diajukan:</p>
                        <ul class="text-md text-white mt-2  list-disc list-inside">
                            <li>Sistem akan menampilkan QR Code</li>  
                            <li>Temui petugas untuk memindai QR Code</li>  
                            <li>Petugas akan mencetak surat izin & memberikan tanda tangan persetujuan</li>
                        </ul>
                    </div>
                    <div class="flex-shrink-0 hidden md:block">
                        <img src="{{asset('storage/asset/QR Code-amico.svg')}}" alt="Scan QR Code" class="w-20 md:w-40">
                    </div>
                </div>
            </div>

            {{-- Bukti Izin --}}
            <div class="w-full sm:w-1/2 px-2 mb-4">
                <div class="bg-[#5F9EF2] rounded-lg p-6 flex items-center justify-between text-white">
                    <div class="flex-1 pr-4">
                        <h1 class="text-xl md:text-2xl font-semibold mb-2">
                             <span class="inline-flex items-center justify-center bg-white text-[#5F9EF2] font-semibold w-8 h-8 rounded-full">4</span> 
                            Upload Bukti Izin</h1>
                        <p class="text-md text-gray-800 mt-2">Setelah izin digunakan, siswa wajib mengunggah bukti:</p>
                        <ul class="text-md text-white mt-2 list-disc list-inside">
                            <li>Jika izin industri/bimbingan, unggah foto bersama pembimbing.</li>  
                            <li>Jika izin sakit, unggah bukti sampai di rumah atau surat keterangan dokter.</li>  
                            <li>Petugas akan mencetak surat izin & memberikan tanda tangan persetujuan</li>
                        </ul>
                        <p class="text-sm text-red-600 mt-2">📌 Jika bukti tidak diunggah, status izin dianggap belum selesai.</p>
                    </div>
                    <div class="flex-shrink-0 hidden md:block">
                        <img src="{{asset('storage/asset/Image upload-amico.svg')}}" alt="Scan QR Code" class="w-20 md:w-40">
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    {{-- section 5 FAQ --}}
    <div class="container mx-auto p-4 mt-8">
        <div class="bg-[#5F9EF2] rounded-2xl p-8 shadow-lg">
            <h1 class="text-white text-2xl md:text-4xl font-bold text-center mb-6">Frequently Asked Questions</h1>

            <div class="space-y-4">
                {{-- FAQ 1 --}}
                <div class="accordion-item border-l-4 border-[#0063CB] shadow-md bg-white rounded-lg overflow-hidden transition-all duration-300">
                    <button class="accordion-header w-full p-4 flex items-center justify-between text-left focus:outline-none">
                        <span class="text-lg font-semibold text-gray-800">Apa itu E-SIS?</span>
                        <span class="accordion-icon bg-[#5F9EF2] p-1.5 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white transition-transform duration-300" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button>
                    <div class="accordion-content p-4 text-gray-600 hidden">
                        <p>E-SIS adalah aplikasi berbasis web yang dirancang untuk mempermudah proses pengajuan izin siswa di sekolah secara digital.</p>
                    </div>
                </div>

                {{-- FAQ 2 --}}
                <div class="accordion-item border-l-4 border-[#0063CB] shadow-md bg-white rounded-lg overflow-hidden transition-all duration-300">
                    <button class="accordion-header w-full p-4 flex items-center justify-between text-left focus:outline-none">
                        <span class="text-lg font-semibold text-gray-800">Apa itu E-SIS?</span>
                        <span class="accordion-icon bg-[#5F9EF2] p-1.5 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white transition-transform duration-300" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button>
                    <div class="accordion-content p-4 text-gray-600 hidden">
                        <p>E-SIS adalah aplikasi berbasis web yang dirancang untuk mempermudah proses pengajuan izin siswa di sekolah secara digital.</p>
                    </div>
                </div>

                {{-- FAQ 3 --}}
            </div>
        </div>
    </div>

    {{-- section 6 footer --}}
    <footer class="bg-[#5F9EF2] text-black">
         <div class="max-w-7xl mx-auto px-4 py-6 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="flex items-center text-white gap-4 ">
                <img src="{{asset('storage/asset/logo.png')}}" alt="" class="w-12 h-16 mb-4 mt-2 ">
                <p class="text-black">Aplikasi digital untuk mempermudah siswa dalam mengajukan izin sekolah secara cepat, praktis, dan transparan.</p>
            </div>

            {{-- custumer service --}}
            <div>
                <h1 class="text-black text-2xl font-bold">Customer Service</h1>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-center gap-2">
                        <img src="https://salmon-rook-410155.hostingersite.com/image/icons/gmail.svg" alt="" class="w-5 h-5">
                        <a href="#" class="hover:underline text-[#223A5E]">Email</a>
                    </li>
                    <li class="flex items-center gap-2">
                        <img src="https://salmon-rook-410155.hostingersite.com/image/icons/whatsapp.svg" alt="" class="w-5 h-5">
                        <a href="#" class="hover:underline text-[#223A5E]">WhatsApp</a>
                    </li>
                    <li class="flex items-center gap-2">
                        <img src="https://salmon-rook-410155.hostingersite.com/image/icons/instagram.svg" alt="" class="w-5 h-5">
                        <a href="https://www.instagram.com/smkn1gunungputri?igsh=aXc3Y2hic2RwN2o4" class="hover:underline text-[#223A5E]">@smkn1gunungputri</a>
                    </li>
                </ul>
            </div>
            <div style="flex:1; min-width:200px;">
                <h3 class="text-black text-2xl font-bold">Jam Layanan</h3>
                <p>Senin - Jumat: 08:00 - 16:00</p>
                <p>Sabtu: 08:00 - 12:00</p>
                <p>Minggu & Libur Nasional: Tutup</p>
            </div>

            
        </div>
        <div class="border-t border-t-[#4A80C5] py-4 bg-[#568EDA]">
            <div class="text-center font-medium text-white max-w-7xl mx-auto px-4">
                <p class="text-sm">© 2025 E-SIS. All rights reserved.</p>
            </div>
        </div>
    </footer>
</x-app-layout>
