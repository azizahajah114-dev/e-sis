<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Edit Data Siswa</h1>

        <form action="{{ route('admin.siswa.update', $siswa->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block">Nama Siswa</label>
                <select name="user_id" class="w-full border p-2 rounded">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $siswa->user_id ? 'selected' : '' }}>
                            {{ $user->nama }} ({{ $user->nis }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block">Kelas</label>
                <select name="kelas_id" class="w-full border p-2 rounded">
                    @foreach($kelas as $k)
                        <option value="{{ $k->id }}" {{ $k->id == $siswa->kelas_id ? 'selected' : '' }}>
                            {{ $k->nama_kelas }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block">Jurusan</label>
                <select name="jurusan_id" class="w-full border p-2 rounded">
                    @foreach($jurusan as $j)
                        <option value="{{ $j->id }}" {{ $j->id == $siswa->jurusan_id ? 'selected' : '' }}>
                            {{ $j->nama_jurusan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="w-full border p-2 rounded" value="{{ $siswa->tempat_lahir }}">
            </div>

            <div>
                <label class="block">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="w-full border p-2 rounded" value="{{ $siswa->tanggal_lahir }}">
            </div>

            <div>
                <label class="block">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full border p-2 rounded">
                    <option value="Laki-laki" {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div>
                <label class="block">Nomor HP</label>
                <input type="text" name="nomor_hp" class="w-full border p-2 rounded" value="{{ $siswa->nomor_hp }}">
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
</x-app-layout>
