<x-app-layout>
    <div class="p-6">
        <h1 class="text-xl font-bold mb-4 text-white">Data Kelas</h1>

        <a href="{{ route('admin.form-tambah-kelas') }}" class="px-4 py-2 bg-blue-600 text-white rounded">+ Tambah Kelas</a>

        @if(session('success'))
            <div class="mt-4 p-2 bg-green-500 text-white rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full mt-4 border text-white">
            <thead class="bg-gray-200 text-black">
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Nama Kelas</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kelas as $k)
                    <tr>
                        <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 border">{{ $k->nama_kelas }}</td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('admin.form-edit-kelas', $k->id) }}" class="px-2 py-1 bg-yellow-500 text-white rounded">Edit</a>
                            <form action="{{ route('admin.kelas.destroy', $k->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Hapus kelas ini?')" class="px-2 py-1 bg-red-600 text-white rounded">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
