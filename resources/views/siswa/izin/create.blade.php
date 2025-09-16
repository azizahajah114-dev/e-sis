<x-app-layout>
    <div class="p-6 max-w-lg mx-auto bg-white shadow rounded hidden md:hidden">
        <h1 class="text-xl font-bold mb-4">Form Pengajuan Izin</h1>

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
                <input type="text" name="nis" value="{{ $siswa->nis }}" readonly class="w-full border rounded p-2">
            </div>

            <!-- Nama -->
            <div class="mb-3">
                <label class="block font-medium">Nama</label>
                <input type="text" value="{{ $siswa->nama }}" readonly class="w-full border rounded p-2">
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
                <input type="text" value="{{ $walikelas->nama_walikelas }}" readonly class="w-full border rounded p-2">
                <input type="hidden" name="id_walikelas" value="{{ $walikelas->id }}">
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                Ajukan Izin
            </button>
        </form>
    </div>

    {{-- MOBILE --}}

    <div class="md:hidden">
        <div class="w-full h-[70px] bg-[#5482B3] rounded-b-[30px] p-6 text-center text-white">
            <h1 class="text-xl font-bold mb-4">Form Pengajuan Izin</h1>
        </div>

        @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('izin.store') }}" class="mt-6 bg-slate-400 p-4 rounded-lg">
            @csrf

            <!-- NIS -->
            <div class="mb-3">
                <label class="block font-medium">NIS</label>
                <input type="text" name="nis" value="{{ $siswa->nis }}" readonly class="w-full border rounded p-2">
            </div>

            <!-- Nama -->
            <div class="mb-3">
                <label class="block font-medium">Nama</label>
                <input type="text" value="{{ $siswa->nama }}" readonly class="w-full border rounded p-2">
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
                <input type="text" value="{{ $walikelas->nama_walikelas }}" readonly class="w-full border rounded p-2">
                <input type="hidden" name="id_walikelas" value="{{ $walikelas->id }}">
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                Ajukan Izin
            </button>
        </form>
    </div>
</x-app-layout>

