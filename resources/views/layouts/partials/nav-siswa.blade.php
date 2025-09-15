<!-- Sidebar User -->
<aside class="w-64 bg-blue-800 text-white min-h-screen flex flex-col">
    <div class="p-4 text-lg font-bold border-b border-blue-700">
        Surat Izin Sekolah
    </div>
    <nav class="mt-4 space-y-1 flex-1">
        <!-- Menu user nanti -->
        <a href="{{ route('siswa.dashboard') }}" class="block px-4 py-2 hover:bg-blue-700">Dashboard</a>
        <a href="{{ route('siswa.profil') }}" class="block px-4 py-2 hover:bg-blue-700">Profil</a>
        <a href="{{ route('izin.create') }}" class="block px-4 py-2 hover:bg-blue-700">Ajukan Izin</a>
        <a href="{{ route('izin.riwayat') }}" class="block px-4 py-2 hover:bg-blue-700">Riwayat Izin</a>
    </nav>
    <div class="p-4 border-t border-blue-700">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full px-4 py-2 bg-red-600 hover:bg-red-700 rounded">
                Logout
            </button>
        </form>
    </div>
</aside>
