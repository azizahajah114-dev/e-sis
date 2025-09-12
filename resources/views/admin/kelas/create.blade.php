<x-app-layout>
    <div class="p-6">
        <h1 class="text-xl font-bold mb-4 text-white">Tambah Kelas</h1>

        <form action="{{ route('admin.kelas.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block font-medium">Nama Kelas</label>
                <input type="text" name="nama_kelas" class="w-full border rounded p-2" required>
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
            <a href="{{ route('admin.data-kelas') }}" class="px-4 py-2 bg-gray-600 text-white rounded">Kembali</a>
        </form>
    </div>
</x-app-layout>
