<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Validasi Izin</h1>

        <div class="mb-6 p-4 border rounded bg-gray-50">
            <p><strong>Nama Siswa:</strong> {{ $izin->user->nama }}</p>
            <p><strong>NIS:</strong> {{ $izin->user->nis }}</p>
            <p><strong>Kelas:</strong> {{ $izin->walikelas->kelas->nama_kelas ?? '-' }}</p>
            <p><strong>Jenis Izin:</strong> {{ ucfirst($izin->jenis_izin) }}</p>
            <p><strong>Tanggal Izin:</strong> {{ $izin->tanggal }}</p>
            <p><strong>Jam Keluar:</strong> {{ $izin->jam_keluar }}</p>
            <p><strong>Status:</strong> 
                <span class="text-yellow-600 font-semibold">{{ ucfirst($izin->status_izin) }}</span>
            </p>
        </div>

        <form action="{{ route('admin.validasi.proses', $izin->id) }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block font-medium">Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" class="border p-2 w-full" required>
                @error('tanggal_kembali') <p class="text-red-500">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block font-medium">Jam Kembali</label>
                <input type="time" name="jam_kembali" class="border p-2 w-full" required>
                @error('jam_kembali') <p class="text-red-500">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">
                Selesaikan Izin
            </button>
        </form>
    </div>
</x-app-layout>
