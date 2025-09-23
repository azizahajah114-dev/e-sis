<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold text-black">Daftar Pengguna</h1>
    </div>

    {{-- Import & Export --}}
    <div class="flex items-center gap-6 px-6 mb-6">
        {{-- Form Import Global --}}
        <form action="{{ route('admin.data-pengguna.import.global') }}" method="POST" enctype="multipart/form-data"
            class="flex items-center gap-6">
            @csrf
            <input type="file" name="file" class="border rounded p-1 w-[320px] bg-gray-300" required>
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Import Excel
            </button>
        </form>

        {{-- Form Export Global --}}
        <form action="{{ route('admin.data-pengguna.download-format') }}" method="POST" enctype="multipart/form-data"
            class="flex items-center gap-6">
            @csrf
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Download Format
            </button>
        </form>
    </div>

    {{-- Input Pencarian --}}
    <div class="px-6">
        <div class="flex items-center mb-4">
            <i data-lucide="search" class="w-5 h-5 mr-2 text-gray-500"></i>
            <input type="text" id="search-kelas" placeholder="Cari nama kelas..."
                class="border border-gray-300 rounded px-3 py-2 w-1/3 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
    </div>

    {{-- Card Kelas --}}
    <div id="kelas-container" class="grid grid-cols-1 md:grid-cols-3 gap-6 px-6 mt-6">
        @foreach ($kelas as $k)
            <a href="{{ route('admin.data-pengguna.kelas', $k->id) }}"
                class="block p-6 bg-[#0062C8] rounded-lg shadow-xl hover:shadow-2xl transition-transform duration-300 hover:translate-y-[-5px]">
                <h2 class="text-lg text-white font-semibold">{{ $k->nama_kelas }}</h2>
                <p class="text-sm text-white">Lihat pengguna kelas ini</p>
            </a>
        @endforeach
    </div>

    {{-- Script Search --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("search-kelas");
            const kelasContainer = document.getElementById("kelas-container");

            searchInput.addEventListener("keyup", function() {
                let query = this.value;

                fetch(`{{ route('admin.data-pengguna.search') }}?q=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        kelasContainer.innerHTML = "";

                        if (data.length === 0) {
                            kelasContainer.innerHTML = `
                                <p class="text-center col-span-3 text-gray-600">Data tidak ditemukan</p>
                            `;
                        } else {
                            data.forEach(kelas => {
                                kelasContainer.innerHTML += `
                                    <a href="/admin/data-pengguna/${kelas.id}"
                                        class="block p-6 bg-[#0062C8] rounded-lg shadow-xl hover:shadow-2xl transition-transform duration-300 hover:translate-y-[-5px]">
                                        <h2 class="text-lg text-white font-semibold">${kelas.nama_kelas}</h2>
                                        <p class="text-sm text-white">Lihat pengguna kelas ini</p>
                                    </a>
                                `;
                            });
                        }
                    });
            });
        });
    </script>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: "{{ session('success') }}",
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    });
</script>
@endif

@if(session('import_errors'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal Import!',
        html: `{!! implode('<br>', session('import_errors')) !!}`,
        confirmButtonColor: '#d33',
        confirmButtonText: 'OK'
    });
</script>
@endif
