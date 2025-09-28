<x-app-layout>
    {{-- desktop --}}
    <div class="hidden md:block">
        <div class="container mx-auto p-4 mt-8">
            <div class="bg-[#568EDA] rounded-2xl p-8 shadow-lg">
                <h1 class="text-white text-center text-xl md:text-4xl font-bold mb-4">Panduan Mengajukan Izin</h1>

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
                        <div class="flex-shrink-0">
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
                        <div class="flex-shrink-0"> 
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
                        <div class="flex-shrink-0">
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
                        <div class="flex-shrink-0">
                            <img src="{{asset('storage/asset/Image upload-amico.svg')}}" alt="Scan QR Code" class="w-20 md:w-40">
                        </div>
                    </div>
                </div>
                </div>
                <a href="{{route('izin.create')}}">
                    <div class="border border-[#224779] text-[#224779] rounded-lg hover:bg-[#2b5d9e] hover:text-white text-center  shadow-md p-5">
                        <h1 class=" font-bold text-xl">Ajukan Izin</h1>
                    </div>
                </a>
            </div>
        </div>
    </div>

    {{-- mobile --}}
    <div class="md:hidden">
        <div class="bg-[#5F9EF2] w-full h-16 rounded-b-lg p-6 text-center fixed top-0 right-0 left-0 z-10 text-white">
                <h1 class="text-xl font-bold mb-6 text-white">
                    Panduan Izin
                </h1>
            </div>
        <div class="p-6 mt-8 flex md:flex-col">
            <div class="bg-[#5482B3]  rounded-lg p-6 md:w-2/3">
                <h1 class="text-white text-2xl text-center mb-5">Panduan Izin</h1>
            {{-- card --}}
            <div class="flex flex-wrap -mx-2">
                {{-- lengkapi profile --}}
                <div class="w-full sm:w-1/2 px-2 mb-4">
                     <div class="bg-white rounded-lg p-6 flex flex-col items-center justify-between w-full ">                        
                        <div>
                            <h1 class="font-bold">Lengkapi Data Diri</h1>
                            <p class="text-md text-gray-800">Sebelum mengajukan izin, pastikan siswa sudah mengisi data diri lengkap pada menu Profil Siswa.</p>
                            <p class="text-md text-red-600">📌 Tanpa data diri yang lengkap, siswa tidak dapat mengajukan izin.</p>
                        </div>
                    </div>
                </div>
                {{-- lengkapi profile --}}
                <div class="w-full sm:w-1/2 px-2 mb-4">
                     <div class="bg-white rounded-lg p-6 flex flex-col items-center justify-between w-full ">                        
                        <div>
                            <h1 class="font-bold">Ajukan Izin</h1>
                            <p class="text-md text-gray-800">Setelah data lengkap, siswa dapat mengajukan izin dengan langkah berikut:</p>
                            <p><ul>
                            <li>Pilih jenis izin: Sakit / Izin</li>    
                            <li>Isi alasan dan keterangan (misalnya: kembali ke sekolah atau langsung pulang ke rumah)</li>
                            <li>Isi jam keluar sesuai dengan waktu izin.</li>
                            </ul></p>
                        </div>
                    </div>
                </div>
                {{-- Dapatkan QR Code Persetujuan --}}
                <div class="w-full sm:w-1/2 px-2 mb-4">
                     <div class="bg-white rounded-lg p-6 flex flex-col items-center justify-between w-full ">                        
                        <div>
                            <h1 class="font-bold">Dapatkan QR Code Persetujuan</h1>
                            <p class="text-md text-gray-800">Setelah formulir izin diajukan:</p>
                            <p><ul>
                            <li>Sistem akan menampilkan QR Code</li>    
                            <li>Temui petugas untuk memindai QR Code</li>
                            <li>Petugas akan mencetak surat izin & memberikan tanda tangan persetujuan</li>
                            </ul></p>
                        </div>
                    </div>
                </div>
                {{-- upload bukti --}}
                <div class="w-full sm:w-1/2 px-2 mb-4">
                     <div class="bg-white rounded-lg p-6 flex flex-col items-center justify-between w-full ">                        
                        <div>
                            <h1 class="font-bold">Upload Bukti Izin</h1>
                            <p class="text-sm text-gray-800 mt-2">Setelah izin digunakan, siswa wajib mengunggah bukti:</p>
                             <p class="text-sm text-red-600 mt-2"><ul>
                                <li>Jika izin industri/bimbingan, unggah foto bersama pembimbing.</li>  
                                <li>TJika izin sakit, unggah bukti sampai di rumah atau surat keterangan dokter.</li>  
                                <li>Petugas akan mencetak surat izin & memberikan tanda tangan persetujuan</li>
                            </ul></p>
                            <p class="text-sm text-red-600 mt-2">📌 Jika bukti tidak diunggah, status izin dianggap belum selesai.</p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{route('izin.create')}}">
            <div class="bg-[#224779] text-center rounded-lg shadow-md p-5">
                 <h1 class="text-white font-bold text-xl">Ajukan Izin</h1>
            </div></a>
        </div>
    </div>
</x-app-layout>