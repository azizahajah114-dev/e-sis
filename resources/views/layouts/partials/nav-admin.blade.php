<!-- Sidebar Admin -->
<aside class="w-64 bg-gray-800 text-white min-h-screen flex flex-col">
    <div class="p-4 text-lg font-bold border-b border-gray-700">
        Surat Izin Sekolah
    </div>
    <nav class="mt-4 space-y-1 flex-1">
        <a href="{{ route('admin.dashboard') }}"
            class="block px-4 py-2 hover:bg-gray-700 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700' : '' }}">
            Dashboard
        </a>
        <a href="{{ route('admin.data-pengguna')}}"
            class="block px-4 py-2 hover:bg-gray-700 {{ request()->routeIs('admin.data-pengguna*') ? 'bg-gray-700' : '' }}">
            Data Pengguna
        </a>
        <a href="{{ route('admin.data-kelas')}}"
            class="block px-4 py-2 hover:bg-gray-700 {{ request()->routeIs('admin.data-kelas*') ? 'bg-gray-700' : '' }}">
            Data Kelas
        </a>
        <a href="{{ route('admin.data-jurusan')}}"
            class="block px-4 py-2 hover:bg-gray-700 {{ request()->routeIs('admin.data-kelas*') ? 'bg-gray-700' : '' }}">
            Data Jurusan
        </a>
        <a href="{{ route('admin.data-siswa')}}"
            class="block px-4 py-2 hover:bg-gray-700 {{ request()->routeIs('admin.data-kelas*') ? 'bg-gray-700' : '' }}">
            Data Siswa
        </a>
        <a href="{{ route('admin.data-walikelas')}}"
            class="block px-4 py-2 hover:bg-gray-700 {{ request()->routeIs('admin.data-kelas*') ? 'bg-gray-700' : '' }}">
            Data Walikelas
        </a>
        <a href="{{ route('admin.data-petugas')}}"
            class="block px-4 py-2 hover:bg-gray-700 {{ request()->routeIs('admin.data-kelas*') ? 'bg-gray-700' : '' }}">
            Data Petugas
        </a>
        <a href="{{ route('admin.izin.index')}}"
            class="block px-4 py-2 hover:bg-gray-700 {{ request()->routeIs('admin.data-kelas*') ? 'bg-gray-700' : '' }}">
            Laporan Izin
        </a>
    </nav>
    <div class="p-4 border-t border-gray-700">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full px-4 py-2 bg-red-600 hover:bg-red-700 rounded">
                Logout
            </button>
        </form>
    </div>
</aside>
