<x-app-layout>
    <div class="hidden md:block">
        <div class="py-6">
            <nav class="text-sm font-medium text-neutral-600 dark:text-neutral-300" aria-label="breadcrumb">
                <ol class="flex flex-wrap items-center gap-1">
                    <li class="flex items-center gap-1">
                        <a href="{{ route('admin.data-pengguna') }}" class="text-black text-md">Data Pengguna</a>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true" stroke-width="2" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </li>
                    <li class="flex items-center text-neutral-900 gap-1 font-bold " >Pengguna Kelas {{ $kelas->nama_kelas }}</li>
                </ol>
            </nav>
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
    </div>

    <div class="md:hidden">
        <div class="py-6">
            <a href="{{route('admin.data-pengguna')}}}">
                <div class="absolute">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left-icon lucide-chevron-left"><path d="m15 18-6-6 6-6"/></svg>
                </div>
            </a>
            <h1 class="absolute left-1/2 -translate-x-1/2 text-xl text-center font-bold text-[#017BFA]">
                Pengguna Kelas {{ $kelas->nama_kelas }}
            </h1>
        </div>
        

        {{-- Table User --}}
        <div class="overflow-x-auto mt-12">
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

    </div>
</x-app-layout>
