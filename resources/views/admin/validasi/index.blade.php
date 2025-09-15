<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Daftar Izin Menunggu Validasi</h1>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($izinList->isEmpty())
            <p class="text-gray-600">Tidak ada izin yang menunggu validasi.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($izinList as $izin)
                    <div class="p-4 border rounded shadow bg-white">
                        <h2 class="font-bold text-lg mb-2">{{ $izin->user->nama }}</h2>
                        <p><strong>Kelas:</strong> {{ $izin->walikelas->kelas->nama_kelas ?? '-' }}</p>
                        <p><strong>Jenis Izin:</strong> {{ ucfirst($izin->jenis_izin) }}</p>
                        <p><strong>Tanggal:</strong> {{ $izin->tanggal }}</p>
                        <p><strong>Jam Keluar:</strong> {{ $izin->jam_keluar }}</p>

                        <a href="{{ route('admin.validasi.show', $izin->id) }}"
                           class="mt-3 inline-block px-3 py-2 bg-blue-600 text-white rounded">
                            Validasi Sekarang
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
