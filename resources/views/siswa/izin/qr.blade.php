<x-app-layout>
    <div class="p-6 text-center">
        <h1 class="text-2xl font-bold mb-4">QR Code Izin</h1>

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
</x-app-layout>
