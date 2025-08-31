<x-app-layout>
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white min-h-screen">
            <div class="p-4 text-lg font-bold border-b border-gray-700">
                Surat Izin Sekolah
            </div>
            <nav class="mt-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 hover:bg-gray-700">Dashboard</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700">Data Pengguna</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700">Data Kelas</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700">Data Jurusan</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700">Data Mapel</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700">Data Jabatan</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700">Data Siswa</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700">Data Guru</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700">Data Walikelas</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700">Laporan Izin</a>
            </nav>
            <div class="mt-auto p-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full px-4 py-2 bg-red-600 hover:bg-red-700 rounded">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 bg-gray-100">
            <h1 class="text-2xl font-bold mb-4">Dashboard Admin</h1>
            
            <div class="bg-white rounded-lg shadow p-6">
                <p class="text-gray-700">Selamat datang di dashboard admin. Silakan pilih menu di sidebar untuk mengelola data.</p>
            </div>
        </main>
    </div>
</x-app-layout>
