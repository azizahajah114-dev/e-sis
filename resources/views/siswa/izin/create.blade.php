<x-app-layout>
    <div class="p-6  hidden md:block ">
        <div class=" bg-white p-10 rounded-xl">
            <h1 class="text-xl font-bold mb-4 text-[#224779] text-center">Form Pengajuan Izin</h1>
            <hr class="border-1 border-[#224779]">

            <div class="flex-1 flex gap-8">
                <div class="flex-1 w-1/2 space-y-6 p-8">
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

                        <div class="mt-3 mb-3 text-[#052356]">
                            <p class="text-[#052356] text-lg"><strong>Nama:</strong> {{$siswa->nama}}</p>
                            <p class="text-[#052356] text-lg"><strong>NIS:</strong> {{$siswa->nis}}</p>
                        </div>
                        <!-- NIS -->
                        {{-- <div class="mb-3 text-[#052356]">
                            <label class="block font-bold">NIS</label>
                            <input type="text" name="nis" value="{{ $siswa->nis ?? '-' }}" readonly
                                class="w-full border rounded p-2">
                        </div> --}}

                        <!-- Nama -->
                        {{-- <div class="mb-3 text-[#052356]">
                            <label class="block font-bold">Nama</label>
                            <input type="text" value="{{ $siswa->nama ?? '-' }}" readonly
                                class="w-full border rounded p-2">
                        </div> --}}

                        <!-- Jenis Izin -->
                        <div class="mb-3 text-[#052356]">
                            <label class="block font-bold">Jenis Izin</label>
                            <select name="jenis_izin" class="w-full border rounded p-2" required>
                                <option value="">-- Pilih --</option>
                                <option value="sakit">Sakit</option>
                                <option value="izin">Izin</option>
                            </select>
                        </div>

                        <!-- Keterangan -->
                        <div class="mb-3 text-[#052356]">
                            <label class="block font-bold">Keterangan</label>
                            <textarea name="keterangan" class="w-full border rounded p-2"></textarea>
                        </div>

                        <!-- Jam Keluar -->
                        <div class="mb-3 text-[#052356]">
                            <label class="block font-bold">Jam Keluar</label>
                            <input type="time" name="jam_keluar" class="w-full border rounded p-2" required>
                        </div>

                        <!-- Walikelas -->
                        <div class="mb-3 text-[#052356]">
                            <label class="block font-bold">Wali Kelas</label>
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
                {{-- ilustrasi --}}
                <div class="flex-shrink-0 md:w-1/2 lg:w-1/3 flex items-center justify-center">
                    <img src="{{ asset('storage/asset/ajukan.png') }}"
                        alt="Ilustrasi Upload Bukti" class="max-w-sm">
                </div>
            </div>
        </div>
    </div>
 
    {{-- mobile --}}
    <div class="md:hidden">
        <div class="bg-[#5482B3] w-full h-[70px] rounded-b-lg p-6 fixed top-0 right-0 left-0 text-center text-white">
            <h1 class="text-xl font-bold mb-4">Pengajuan Izin</h1>
        </div>

        <div class="bg-white rounded-md p-6 mt-16">

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
                    <label class="block font-medium text-[#052356]">NIS</label>
                    <input type="text" name="nis" value="{{ $siswa->nis ?? '-' }}" readonly
                        class="w-full border rounded p-2">
                </div>

                <!-- Nama -->
                <div class="mb-3">
                    <label class="block font-medium text-[#052356]">Nama</label>
                    <input type="text" value="{{ $siswa->nama ?? '-' }}" readonly
                        class="w-full border rounded p-2">
                </div>

                <!-- Jenis Izin -->
                <div class="mb-3">
                    <label class="block font-medium text-[#052356]">Jenis Izin</label>
                    <select name="jenis_izin" class="w-full border rounded p-2" required>
                        <option value="">-- Pilih --</option>
                        <option value="sakit">Sakit</option>
                        <option value="izin">Izin</option>
                    </select>
                </div>

                <!-- Keterangan -->
                <div class="mb-3">
                    <label class="block font-medium text-[#052356]">Keterangan</label>
                    <textarea name="keterangan" class="w-full border rounded p-2"></textarea>
                </div>

                <!-- Jam Keluar -->
                <div class="mb-3">
                    <label class="block font-medium text-[#052356]">Jam Keluar</label>
                    <input type="time" name="jam_keluar" class="w-full border rounded p-2" required>
                </div>

                <!-- Walikelas -->
                <div class="mb-3">
                    <label class="block font-medium text-[#052356]">Wali Kelas</label>
                    <input type="text" value="{{ $walikelas->nama_walikelas ?? '-' }}" readonly
                        class="w-full border rounded p-2">
                    <input type="hidden" name="id_walikelas" value="{{ $walikelas->id ?? '' }}">
                </div>

                <button type="submit"
                    class="px-4 py-2 w-full bg-[#0063CB] hover:bg-[#0555ac] text-white rounded"
                    @if(!$siswa->nis || !$siswa->nama || !$walikelas) disabled @endif>
                    Ajukan Izin
                </button>
            </form>
        </div>
    </div>
    
</x-app-layout>
