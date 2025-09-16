<x-app-layout>
    <div class="max-w-3xl mx-auto hidden md:hidden">
        <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-200">
            Ubah Data Diri
        </h1>

        <form action="{{ route('siswa.profil.data-diri.update') }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-[#0F2D5F]">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $siswa->tempat_lahir) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-[#E8EDEF] text-[#052356]" />
            </div>

            <div>
                <label class="block text-sm font-medium text-[#0F2D5F]">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-[#E8EDEF] text-[#052356]" />
            </div>

            <div>
                <label class="block text-sm font-medium text-[#0F2D5F]">Jenis Kelamin</label>
                <select name="jenis_kelamin"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-[#E8EDEF] text-[#052356]">
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki" {{ $siswa->jenis_kelamin === 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                    </option>
                    <option value="Perempuan" {{ $siswa->jenis_kelamin === 'Perempuan' ? 'selected' : '' }}>Perempuan
                    </option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-[#0F2D5F]">Nomor HP</label>
                <input type="text" name="nomor_hp" value="{{ old('nomor_hp', $siswa->nomor_hp) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-[#E8EDEF] text-[#052356]" />
            </div>

            <div>
                <label class="block text-sm font-medium text-[#0F2D5F]">Kelas</label>
                <select name="kelas_id"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-[#E8EDEF] text-[#052356]">
                    <option value="">-- Pilih Kelas --</option>
                    @foreach ($kelas as $k)
                    <option value="{{ $k->id }}" {{ $siswa->kelas_id == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kelas }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-[#0F2D5F]">Jurusan</label>
                <select name="jurusan_id"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-[#E8EDEF] text-[#052356]">
                    <option value="">-- Pilih Jurusan --</option>
                    @foreach ($jurusan as $j)
                    <option value="{{ $j->id }}" {{ $siswa->jurusan_id == $j->id ? 'selected' : '' }}>
                        {{ $j->nama_jurusan }}
                    </option>
                    @endforeach
                </select>
            </div>


            <div class="flex justify-end gap-3">
                <a href="{{ route('siswa.profil.data-diri') }}"
                    class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    {{-- mobile --}}
    <div class="md:hidden">
        <div class="w-full h-[70px] bg-[#5482B3] rounded-b-[20px] p-6 text-center text-white">
            <h1 class="text-2xl font-bold mb-6 text-[#052356]">
                Ubah Data Diri
            </h1>
        </div>

        <form action="{{ route('siswa.profil.data-diri.update') }}" method="POST" class="space-y-4 bg-[#E8EDEF] p-4 mt-6 rounded-lg">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-[#0F2D5F]">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $siswa->tempat_lahir) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-[#E8EDEF] text-[#052356]" />
            </div>

            <div>
                <label class="block text-sm font-medium ">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-[#E8EDEF] text-[#052356]" />
            </div>

            <div>
                <label class="block text-sm font-medium text-[#0F2D5F]">Jenis Kelamin</label>
                <select name="jenis_kelamin"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-[#E8EDEF] text-[#052356]">
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki" {{ $siswa->jenis_kelamin === 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                    </option>
                    <option value="Perempuan" {{ $siswa->jenis_kelamin === 'Perempuan' ? 'selected' : '' }}>Perempuan
                    </option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-[#0F2D5F]">Nomor HP</label>
                <input type="text" name="nomor_hp" value="{{ old('nomor_hp', $siswa->nomor_hp) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-[#E8EDEF] text-[#052356]" />
            </div>

            <div>
                <label class="block text-sm font-medium text-[#0F2D5F]">Kelas</label>
                <select name="kelas_id"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-[#E8EDEF] text-[#052356]">
                    <option value="">-- Pilih Kelas --</option>
                    @foreach ($kelas as $k)
                    <option value="{{ $k->id }}" {{ $siswa->kelas_id == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kelas }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-[#0F2D5F]">Jurusan</label>
                <select name="jurusan_id"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-[#E8EDEF] text-[#052356]">
                    <option value="">-- Pilih Jurusan --</option>
                    @foreach ($jurusan as $j)
                    <option value="{{ $j->id }}" {{ $siswa->jurusan_id == $j->id ? 'selected' : '' }}>
                        {{ $j->nama_jurusan }}
                    </option>
                    @endforeach
                </select>
            </div>


            <div class="flex justify-end gap-3">
                <a href="{{ route('siswa.profil.data-diri') }}"
                    class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
