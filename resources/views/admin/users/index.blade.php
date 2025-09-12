<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6 text-white">Data Pengguna</h1>

        <!-- Alert Success -->
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tombol Tambah -->
        <div class="mb-4">
            <a href="{{ route('admin.form-tambah-pengguna') }}" 
               class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                + Tambah Pengguna
            </a>
        </div>

        <!-- Tabel -->
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 border">#</th>
                        <th class="px-4 py-2 border">Nama</th>
                        <th class="px-4 py-2 border">NIS</th>
                        <th class="px-4 py-2 border">Role</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border">{{ $users->firstItem() + $index }}</td>
                            <td class="px-4 py-2 border">{{ $user->nama }}</td>
                            <td class="px-4 py-2 border">{{ $user->nis }}</td>
                            <td class="px-4 py-2 border capitalize">{{ $user->role }}</td>
                            <td class="px-4 py-2 border">
                                <a href="{{ route('admin.form-edit-pengguna', $user->id) }}" 
                                   class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" 
                                      method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            onclick="return confirm('Yakin ingin menghapus pengguna ini?')"
                                            class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="p-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
