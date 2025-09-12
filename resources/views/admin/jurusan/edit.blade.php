<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Edit Jurusan</h1>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul class="list-disc pl-6">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.jurusan.update', $jurusan->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-medium">Nama Jurusan</label>
                <input type="text" name="nama_jurusan" 
                       class="w-full border rounded p-2" 
                       value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}" required>
            </div>

            <div class="space-x-2">
                <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update</button>
                <a href="{{ route('admin.data-jurusan') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
            </div>
        </form>
    </div>
</x-app-layout>
