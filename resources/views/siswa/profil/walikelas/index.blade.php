<x-app-layout>
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-200">
            Informasi Wali Kelas
        </h1>

        @if($walikelas)
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                    {{ $walikelas->nama_walikelas }}
                </p>
                <p class="text-gray-600 dark:text-gray-400">
                    Kelas: {{ $walikelas->kelas->nama_kelas }}
                </p>
                @if($walikelas->nomor_hp)
                    <a href="https://wa.me/{{ $walikelas->nomor_hp }}"
                       target="_blank"
                       class="mt-3 inline-block px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                        Chat via WhatsApp
                    </a>
                @endif
            </div>
        @else
            <p class="text-gray-600 dark:text-gray-400">
                Data wali kelas belum tersedia.
            </p>
        @endif
    </div>
</x-app-layout>
