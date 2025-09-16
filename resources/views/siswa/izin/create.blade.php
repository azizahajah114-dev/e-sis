<x-app-layout>
    <div class="p-6 max-w-lg mx-auto bg-white shadow rounded">
        <h1 class="text-xl font-bold mb-4">Form Pengajuan Izin</h1>

        {{-- Warning jika data belum lengkap --}}
        @if (!$siswa->nis || !$siswa->nama || !$walikelas)
            <div class="mb-4 p-3 bg-yellow-100 border border-yellow-400 text-yellow-700 rounded">
                ⚠️ Data profil Anda belum lengkap. Silakan lengkapi profil terlebih dahulu sebelum mengajukan izin.
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul>
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('izin.store') }}">
            @csrf

            <!-- NIS -->
            <div class="mb-3">
                <label class="block font-medium">NIS</label>
                <input type="text" name="nis" value="{{ $siswa->nis ?? '-' }}" readonly
                       class="w-full border rounded p-2">
            </div>

            <!-- Nama -->
            <div class="mb-3">
                <label class="block font-medium">Nama</label>
                <input type="text" value="{{ $siswa->nama ?? '-' }}" readonly
                       class="w-full border rounded p-2">
            </div>

            <!-- Jenis Izin -->
            <div class="mb-3">
                <label class="block font-medium">Jenis Izin</label>
                <select name="jenis_izin" class="w-full border rounded p-2" required>
                    <option value="">-- Pilih --</option>
                    <option value="sakit">Sakit</option>
                    <option value="izin">Izin</option>
                </select>
            </div>

            <!-- Keterangan -->
            <div class="mb-3">
                <label class="block font-medium">Keterangan</label>
                <textarea name="keterangan" class="w-full border rounded p-2"></textarea>
            </div>

            <!-- Jam Keluar -->
            <div class="mb-3">
                <label class="block font-medium">Jam Keluar</label>
                <input type="time" name="jam_keluar" class="w-full border rounded p-2" required>
            </div>

            <!-- Walikelas -->
            <div class="mb-3">
                <label class="block font-medium">Wali Kelas</label>
                <input type="text" value="{{ $walikelas->nama_walikelas ?? '-' }}" readonly
                       class="w-full border rounded p-2">
                <input type="hidden" name="id_walikelas" value="{{ $walikelas->id ?? '' }}">
            </div>

            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded"
                @if(!$siswa->nis || !$siswa->nama || !$walikelas) disabled @endif>
                Ajukan Izin
            </button>
        </form>
    </div>
</x-app-layout>
