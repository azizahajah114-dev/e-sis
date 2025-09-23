<x-app-layout>
    <div class="py-6">
        <h1 class="text-xl font-bold">Pengguna Kelas {{ $kelas->nama_kelas }}</h1>
    </div>

    {{-- Form Import --}}
   {{-- <form action="{{ route('admin.data-pengguna.import', $kelas->id) }}" method="POST" enctype="multipart/form-data"
          class="flex items-center space-x-2 mb-6">
        @csrf
        <input type="file" name="file" class="border rounded p-1" required>
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            Import
        </button>
    </form> --}}

    {{-- Table User --}}
    <div class="overflow-x-auto">
        <table class="w-full border text-left bg-white shadow-lg">
            <thead class="bg-[#017BFA] text-black">
                <tr>
                    <th class="p-2">Nama</th>
                    <th class="p-2">NIS</th>
                    <th class="p-2">Role</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr class="border-t">
                        <td class="p-2">{{ $user->nama }}</td>
                        <td class="p-2">{{ $user->nis }}</td>
                        <td class="p-2">{{ ucfirst($user->role) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="p-4 text-center text-gray-500">
                            Belum ada pengguna di kelas ini
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <a href="{{ route('admin.data-pengguna') }}"
       class="inline-block mt-6 text-blue-600 dark:text-blue-400 hover:underline">
        ← Kembali ke daftar kelas
    </a>
</x-app-layout>
