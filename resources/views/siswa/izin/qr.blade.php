<x-app-layout>
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <h2 class="text-xl font-semibold mb-4">QR Code Izin</h2>

                <div class="mb-3">
                    <p><strong>Nama:</strong> {{ $izin->user->name }}</p>
                    <p><strong>Jenis Izin:</strong> {{ ucfirst($izin->jenis_izin) }}</p>
                    <p><strong>Tanggal:</strong> {{ $izin->tanggal }}</p>
                    <p><strong>Jam Keluar:</strong> {{ $izin->jam_keluar }}</p>
                </div>

                <div class="mb-4">
                    <h5 class="font-semibold">QR Code:</h5>
                    <img src="{{ asset('storage/' . $izin->qr_code) }}" alt="QR Code" class="mt-2 w-48 h-48">
                </div>

                <div class="flex gap-3">
                    <a href="{{ route('siswa.izin.cetak', $izin->id) }}" 
                       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                        Cetak PDF
                    </a>
                    <a href="{{ route('siswa.izin.riwayat') }}" 
                       class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                        Kembali ke Riwayat
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
