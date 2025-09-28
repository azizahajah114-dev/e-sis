<x-app-layout>
    <div class="hidden md:block">
        <div class="relative p-6 text-center bg-white rounded-lg border shadow-md">
            <div class="absolute top-3 left-1/2 -translate-x-1/2 ">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" 
                class="lucide lucide-scan-qr-code-icon lucide-scan-qr-code text-[#73A5D9] text-xl  rounded-full p-2 border shadow-md"><path d="M17 12v4a1 1 0 0 1-1 1h-4"/><path d="M17 3h2a2 2 0 0 1 2 2v2"/><path d="M17 8V7"/><path d="M21 17v2a2 2 0 0 1-2 2h-2"/><path d="M3 7V5a2 2 0 0 1 2-2h2"/><path d="M7 17h.01"/><path d="M7 21H5a2 2 0 0 1-2-2v-2"/><rect x="7" y="7" width="5" height="5" rx="1"/>
                </svg>
            </div>
            
            <h1 class="text-2xl font-bold mb-4 mt-16">QR Code Izin</h1>

            @if(session('success'))
                <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <p class="mb-2">Tunjukkan QR Code ini ke wali kelas/petugas.</p>

            <img src="{{ asset('storage/' . $izin->qr_code) }}" 
                alt="QR Code Izin" 
                class="mx-auto border p-2 bg-white shadow">

            <p class="mt-4 text-gray-600">
                Jika QR di-scan, surat izin akan otomatis ditampilkan.
            </p>

            <div class="mt-6">
                <a href="{{ route('izin.upload.form', $izin->id) }}" 
                class="px-4 py-2 bg-blue-600 text-white rounded shadow">
                    Lanjutkan Upload Bukti Izin
                </a>
            </div>
        </div>
    </div>

    {{-- mobile --}}
    <div class="md:hidden">
        <div class="bg-[#5F9EF2] w-full h-16 rounded-b-lg p-6 text-center fixed top-0 right-0 left-0 z-10 text-white">
                <h1 class="text-xl font-bold mb-6 text-white">
                    QR CODE
                </h1>
            </div>
        <div class=" p-6 text-center bg-white border rounded-lg shadow-md mt-16">

            <div class="absolute top-0 left-1/2 -translate-x-1/2 mt-16">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" 
                class="lucide lucide-scan-qr-code-icon lucide-scan-qr-code text-[#73A5D9] text-xl  rounded-full p-2 border shadow-md"><path d="M17 12v4a1 1 0 0 1-1 1h-4"/><path d="M17 3h2a2 2 0 0 1 2 2v2"/><path d="M17 8V7"/><path d="M21 17v2a2 2 0 0 1-2 2h-2"/><path d="M3 7V5a2 2 0 0 1 2-2h2"/><path d="M7 17h.01"/><path d="M7 21H5a2 2 0 0 1-2-2v-2"/><rect x="7" y="7" width="5" height="5" rx="1"/>
                </svg>
            </div>
            <h1 class="text-2xl font-bold mb-4 mt-6">Tunjukkan QR Code Anda</h1>

            @if(session('success'))
                <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <p class="mb-2">Petugas akan memindai QR ini untuk validasi izin Anda</p>

            <img src="{{ asset('storage/' . $izin->qr_code) }}" 
                alt="QR Code Izin" 
                class="mx-auto border p-2 bg-[white] shadow-md w-48">

            <p class="mt-4 text-gray-600">
                Jika QR di-scan, surat izin akan otomatis ditampilkan.
            </p>

            <div class="mt-6">
                <a href="{{ route('izin.upload.form', $izin->id) }}" 
                class="px-4 py-2 bg-blue-600 text-white rounded shadow">
                    Lanjutkan Upload Bukti Izin
                </a>
            </div>
        </div>
    </div>
    
</x-app-layout>
