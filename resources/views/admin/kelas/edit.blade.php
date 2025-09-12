<x-app-layout>
    <div class="p-6">
        <h1 class="text-xl font-bold mb-4 text-white">Edit Kelas</h1>

        <form action="{{ route('kelas.update', $kela->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block font-medium">Nama Kelas</label>
                <input type="text" name="nama_kelas" value="{{ $kela->nama_kelas }}" class="w-full border rounded p-2" required>
            </div>
            <button type="submit" class="px-4 py-2 bg-yellow-600 text-white rounded">Update</button>
            <a href="{{ route('kelas.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded">Kembali</a>
        </form>
    </div>
</x-app-layout>
