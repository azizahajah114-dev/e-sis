<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-bold">Daftar Kelas</h1>
    </x-slot>

    {{-- Form Import Global --}}
    <form action="{{ route('admin.data-pengguna.import.global') }}" method="POST" enctype="multipart/form-data"
          class="flex items-center space-x-2 mb-6">
        @csrf
        <input type="file" name="file" class="border rounded p-1" required>
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            Import Excel
        </button>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
        @foreach ($kelas as $k)
            <a href="{{ route('admin.data-pengguna.kelas', $k->id) }}"
               class="block p-6 bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition">
                <h2 class="text-lg font-semibold">{{ $k->nama_kelas }}</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">Lihat pengguna kelas ini</p>
            </a>
        @endforeach
    </div>
</x-app-layout>
