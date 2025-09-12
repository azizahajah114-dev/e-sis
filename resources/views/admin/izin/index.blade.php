<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Data Izin</h1>

        <!-- Form Filter -->
        <form method="GET" action="{{ route('admin.izin.index') }}" class="mb-4 flex space-x-4">
            <select name="jurusan_id" class="border rounded p-2">
                <option value="">-- Pilih Jurusan --</option>
                @foreach ($jurusan as $j)
                    <option value="{{ $j->id }}" {{ request('jurusan_id') == $j->id ? 'selected' : '' }}>
                        {{ $j->nama_jurusan }}
                    </option>
                @endforeach
            </select>

            <select name="kelas_id" class="border rounded p-2">
                <option value="">-- Pilih Kelas --</option>
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}" {{ request('kelas_id') == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kelas }}
                    </option>
                @endforeach
            </select>

            <select name="status_izin" class="border rounded p-2">
                <option value="">-- Pilih Status --</option>
                <option value="menunggu" {{ request('status_izin') == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="disetujui" {{ request('status_izin') == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                <option value="ditolak" {{ request('status_izin') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Filter</button>
        </form>

        <!-- Tabel Data -->
        <table class="w-full border-collapse border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2">Nama Siswa</th>
                    <th class="border p-2">Jurusan</th>
                    <th class="border p-2">Kelas</th>
                    <th class="border p-2">Jenis Izin</th>
                    <th class="border p-2">Tanggal</th>
                    <th class="border p-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($izin as $i)
                    <tr>
                        <td class="border p-2">{{ $i->user->nama }}</td>
                        <td class="border p-2">{{ $i->user->siswaLengkap->jurusan->nama_jurusan ?? '-' }}</td>
                        <td class="border p-2">{{ $i->user->siswaLengkap->kelas->nama_kelas ?? '-' }}</td>
                        <td class="border p-2">{{ ucfirst($i->jenis_izin) }}</td>
                        <td class="border p-2">{{ $i->tanggal }}</td>
                        <td class="border p-2">
                            <span class="px-2 py-1 rounded 
                                {{ $i->status_izin == 'disetujui' ? 'bg-green-200 text-green-800' : 
                                   ($i->status_izin == 'ditolak' ? 'bg-red-200 text-red-800' : 'bg-yellow-200 text-yellow-800') }}">
                                {{ ucfirst($i->status_izin) }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $izin->links() }}
        </div>
    </div>
</x-app-layout>
