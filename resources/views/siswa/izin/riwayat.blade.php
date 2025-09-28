<x-app-layout>
    <div class="p-6 hidden md:block">
        <div class="bg-white p-10 rounded-xl">
            <h1 class="text-xl font-bold mb-4 text-[#224779] text-center">Riwayat Izin Saya</h1>
            <hr class="border-1 border-[#224779] mb-6">

            @if($riwayat->isEmpty())
            <p class="text-gray-600">Belum ada riwayat izin.</p>
            @else
            <table class="w-full border-collapse border text-[#0F2D5F] text-center">
                <thead>
                    <tr class="bg-[#5F9EF2] text-center">
                        <th class="border p-2">Tanggal</th>
                        <th class="border p-2">Jenis</th>
                        <th class="border p-2">Keterangan</th>
                        <th class="border p-2">Status</th>
                        <th class="border p-2">Keterangan Izin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($riwayat as $izin)
                    <tr class="bg-[#CDE1FB]">
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

                        @if($izin->hasil_validasi === 'pulang_rumah')
                        <td class="border p-2">Siswa kembali lagi ke sekolah</td>
                        @elseif($izin->hasil_validasi === 'pulang_rumah')
                        <td class="border p-2">Siswa kembali ke rumah</td>
                        @elseif($izin->hasil_validasi === 'izin_lebih_dari_sehari')
                        <td class="border p-2">Siswa izin lebih dari sehari</td>
                        @else
                        <td class="border p-2">-</td>
                        @endif

                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $riwayat->links()}}
            @endif
        </div>
    </div>

    {{-- mobile --}}
    <div class="md:hidden">
        <div class="bg-[#5F9EF2] w-full h-[70px] rounded-b-lg p-6 text-center fixed top-0 right-0 left-0 text-white">
            <h1 class="text-xl font-bold mb-4">Riwayat Izin Saya</h1>
        </div>
        
        @if($riwayat->isEmpty())
            <p class="text-gray-600">Belum ada riwayat izin.</p>
        @else

        <div class="bg-white mt-16 p-5 md:p-6 rounded-xl shadow-lg border-l-4 border-[#017BFA]">
                <div class="space-y-2 text-md">
                    <p class="flex items-center">
                        <strong class="font-bold w-28">Tanggal</strong>: {{ $izin->tanggal }}
                    </p>
                    <p class="flex items-center">
                        <strong class="font-bold w-28">Jenis Izin</strong>: {{ $izin->jenis_izin }}
                    </p>
                    <p class="flex items-center">
                        <strong class="font-bold w-28">Keterangan</strong>: {{$izin->keterangan}}
                    </p>
                </div>
                <hr class="b-2 mb-3 mt-3">
                <div class="flex items-center">
                    <strong class="font-bold w-28">Status</strong>
                                @switch($izin->status_izin)
                                    @case('baru')
                                        <span class="px-2 py-1 bg-blue-500 text-white rounded-full text-sm">
                                            Baru mengajukan izin
                                        </span>
                                        @break

                                    @case('menunggu_bukti')
                                        <span class="px-2 py-1 bg-yellow-500 text-white rounded-full text-sm">
                                            Menunggu bukti lampiran
                                        </span>
                                        @break

                                    @case('menunggu_validasi')
                                        <span class="px-2 py-1 bg-orange-500 text-white rounded-full text-sm">
                                            Sudah kirim bukti, menunggu validasi
                                        </span>
                                        @break

                                    @case('disetujui')
                                        <span class="px-2 py-1 bg-green-500 text-white rounded-full text-sm">
                                            Izin selesai
                                        </span>
                                        @break

                                    @case('ditolak')
                                        <span class="px-2 py-1 bg-red-500 text-white rounded-full text-sm">
                                            Ditolak
                                        </span>
                                        @break

                                    @default
                                        <span class="px-2 py-1 bg-gray-400 text-white rounded-full text-sm">
                                            Status tidak diketahui
                                        </span>
                                @endswitch                    
                
                </div>
        </div>

        @endif
    </div>
</x-app-layout>
