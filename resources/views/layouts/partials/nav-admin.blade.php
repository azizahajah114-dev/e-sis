<!-- Sidebar Admin -->
<aside class="w-64 bg-[#017BFA] text-white min-h-screen flex flex-col">
    <div class="p-4 text-xl font-bold border-b border-blue-600 flex items-center gap-2">
        Surat Izin Sekolah
    </div>
    <nav class="mt-4 space-y-1 flex-1">
        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center px-4 py-2 hover:bg-blue-600 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600' : '' }}">
            <i data-lucide="layout-dashboard" class="w-5 h-5 mr-2"></i>
            Dashboard
        </a>

        <a href="{{ route('admin.data-pengguna')}}"
            class="flex items-center px-4 py-2 hover:bg-blue-600 {{ request()->routeIs('admin.data-pengguna*') ? 'bg-blue-600' : '' }}">
            <i data-lucide="users" class="w-5 h-5 mr-2"></i>
            Data Pengguna
        </a>

        <a href="{{ route('admin.data-kelas')}}"
            class="flex items-center px-4 py-2 hover:bg-blue-600 {{ request()->routeIs('admin.data-kelas*') ? 'bg-blue-600' : '' }}">
            <i data-lucide="layers" class="w-5 h-5 mr-2"></i>
            Data Kelas
        </a>

        <a href="{{ route('admin.data-jurusan')}}"
            class="flex items-center px-4 py-2 hover:bg-blue-600 {{ request()->routeIs('admin.data-jurusan*') ? 'bg-blue-600' : '' }}">
            <i data-lucide="book-open" class="w-5 h-5 mr-2"></i>
            Data Jurusan
        </a>

        <a href="{{ route('admin.data-siswa')}}"
            class="flex items-center px-4 py-2 hover:bg-blue-600 {{ request()->routeIs('admin.data-siswa*') ? 'bg-blue-600' : '' }}">
            <i data-lucide="graduation-cap" class="w-5 h-5 mr-2"></i>
            Data Siswa
        </a>

        <a href="{{ route('admin.data-walikelas')}}"
            class="flex items-center px-4 py-2 hover:bg-blue-600 {{ request()->routeIs('admin.data-walikelas*') ? 'bg-blue-600' : '' }}">
            <i data-lucide="user-check" class="w-5 h-5 mr-2"></i>
            Data Walikelas
        </a>

        <a href="{{ route('admin.data-petugas')}}"
            class="flex items-center px-4 py-2 hover:bg-blue-600 {{ request()->routeIs('admin.data-petugas*') ? 'bg-blue-600' : '' }}">
            <i data-lucide="shield" class="w-5 h-5 mr-2"></i>
            Data Petugas
        </a>

        <a href="{{ route('admin.izin.scanner')}}"
            class="flex items-center px-4 py-2 hover:bg-blue-600 {{ request()->routeIs('admin.izin.scanner') ? 'bg-blue-600' : '' }}">
            <i data-lucide="scan-line" class="w-5 h-5 mr-2"></i>
            Scan Code QR
        </a>

        <a href="{{ route('admin.validasi.index')}}"
            class="flex items-center px-4 py-2 hover:bg-blue-600 {{ request()->routeIs('admin.validasi*') ? 'bg-blue-600' : '' }}">
            <i data-lucide="check-circle" class="w-5 h-5 mr-2"></i>
            Validasi Izin
        </a>

        <a href="{{ route('admin.izin.index')}}"
            class="flex items-center px-4 py-2 hover:bg-blue-600 {{ request()->routeIs('admin.izin*') ? 'bg-blue-600' : '' }}">
            <i data-lucide="file-text" class="w-5 h-5 mr-2"></i>
            Laporan Izin
        </a>
    </nav>

    <div class="p-4 border-t border-blue-600">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-red-600 hover:bg-red-700 rounded">
                <i data-lucide="log-out" class="w-5 h-5 mr-2"></i>
                Logout
            </button>
        </form>
    </div>
</aside>
