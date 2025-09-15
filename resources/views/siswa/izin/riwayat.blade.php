<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Riwayat Izin Saya</h1>

        @if($riwayat->isEmpty())
            <p class="text-gray-600">Belum ada riwayat izin.</p>
        @else
            <table class="w-full border-collapse border">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="border p-2">Tanggal</th>
                        <th class="border p-2">Jenis</th>
                        <th class="border p-2">Keterangan</th>
                        <th class="border p-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($riwayat as $izin)
                        <tr>
                            <td class="border p-2">{{ $izin->tanggal }}</td>
                            <td class="border p-2 capitalize">{{ $izin->jenis_izin }}</td>
                            <td class="border p-2">{{ $izin->keterangan ?? '-' }}</td>
                            <td class="border p-2">
                                @switch($izin->status_izin)
                                    @case('baru')
                                        <span class="px-2 py-1 bg-blue-500 text-white rounded text-sm">
                                            Baru mengajukan izin
                                        </span>
                                        @break

                                    @case('menunggu_bukti')
                                        <span class="px-2 py-1 bg-yellow-500 text-white rounded text-sm">
                                            Menunggu bukti lampiran
                                        </span>
                                        @break

                                    @case('menunggu_validasi')
                                        <span class="px-2 py-1 bg-orange-500 text-white rounded text-sm">
                                            Sudah kirim bukti, menunggu validasi
                                        </span>
                                        @break

                                    @case('disetujui')
                                        <span class="px-2 py-1 bg-green-500 text-white rounded text-sm">
                                            Izin selesai
                                        </span>
                                        @break

                                    @case('ditolak')
                                        <span class="px-2 py-1 bg-red-500 text-white rounded text-sm">
                                            Ditolak
                                        </span>
                                        @break

                                    @default
                                        <span class="px-2 py-1 bg-gray-400 text-white rounded text-sm">
                                            Status tidak diketahui
                                        </span>
                                @endswitch
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $riwayat->links()}}
        @endif
    </div>
</x-app-layout>
