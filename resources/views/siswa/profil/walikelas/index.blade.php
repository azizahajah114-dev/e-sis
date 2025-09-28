@extends('siswa.profil.index')

@section('profile_content_desktop')
    <div class="max-w-2xl mx-auto hidden md:block">
        <h1 class="text-2xl font-bold mb-6 text-[#052356] text-center">
            Informasi Wali Kelas
        </h1>

        @if($walikelas->foto)
        <img src="{{ asset('storage/' . $walikelas->foto) }}" alt="Foto {{ $walikelas->nama_walikelas }}"
            class="w-24 mx-auto mt-6 rounded-full mb-3">
        @endif

        <div class="text-center">
            <p class="text-lg font-semibold text-[#356676]">
                {{ $walikelas->nama_walikelas }}
            </p>
            <p class="text-gray-600 dark:text-gray-400">
                Kelas: {{ $walikelas->kelas->nama_kelas }}
            </p>
        </div>

        @if($walikelas)
        <div class="bg-[#CDE1FB] shadow rounded-lg p-6">
            
            @if($walikelas->nomor_hp)
                <a href="https://wa.me/{{ $walikelas->nomor_hp }}"
                   target="_blank"
                   class="block px-6 py-4 rounded-xl shadow hover:shadow-md text-[#5482B3] mt-2">
                   <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                            class="lucide lucide-message-circle-more-icon lucide-message-circle-more text-[#73A5D9] text-xl bg-[#C3D8F0] rounded-full p-1"><path d="M2.992 16.342a2 2 0 0 1 .094 1.167l-1.065 3.29a1 1 0 0 0 1.236 1.168l3.413-.998a2 2 0 0 1 1.099.092 10 10 0 1 0-4.777-4.719"/>
                            <path d="M8 12h.01"/><path d="M12 12h.01"/><path d="M16 12h.01"/>
                        </svg>
                        <h2 class="text-lg font-semibold text-[#5482B3]">Chat Via WhatsApp</h2>
                   </div>
                </a>
            @endif
        </div>
        @else
        <p class="text-gray-600 dark:text-gray-400">
            Data wali kelas belum tersedia.
        </p>
        @endif
    </div>
@endsection

    {{-- mobile --}}
@section('profile_content_mobile')
    <div class="md:hidden">
        <div class="bg-[#0063CB] w-full h-[70px] rounded-b-lg p-6 text-center fixed top-0 right-0 left-0 text-white flex">
            <a href="{{route("siswa.profil")}}">
                <div class="absolute">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left-icon lucide-chevron-left"><path d="m15 18-6-6 6-6"/></svg>
                </div>
            </a>
            <h1 class="absolute left-1/2 -translate-x-1/2 text-xl font-bold text-white">
                Informasi Wali Kelas
            </h1>
        </div>

        <div class="mt-16">
            <img src="{{asset('storage/' . $walikelas->foto)}}" class="w-20 h-20 mx-auto mt-10 rounded-full border-4 border-white" alt="foto walikelas">
            <h2 class="mt-3 font-semibold text-lg text-center text-[#356676]">{{$walikelas->nama_walikelas}}</h2>
        </div>
        
        @if($walikelas)
            <div class="bg-[#CDE1FB]  shadow rounded-lg p-6 mt-8">
                <p class="text-lg font-semibold text-[#5482B3]">
                    {{ $walikelas->nama_walikelas }}
                </p>
                <p class="text-gray-600 dark:text-[#5482B3]">
                    Kelas: {{ $walikelas->kelas->nama_kelas }}
                </p>
                @if($walikelas->nomor_hp)
                    <a href="https://wa.me/{{ $walikelas->nomor_hp }}"
                       target="_blank"
                       class="block px-6 py-4 rounded-xl shadow hover:shadow-md text-[#5482B3] mt-2">
                       <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                            class="lucide lucide-message-circle-more-icon lucide-message-circle-more text-[#73A5D9] text-xl bg-[#C3D8F0] rounded-full p-1"><path d="M2.992 16.342a2 2 0 0 1 .094 1.167l-1.065 3.29a1 1 0 0 0 1.236 1.168l3.413-.998a2 2 0 0 1 1.099.092 10 10 0 1 0-4.777-4.719"/>
                            <path d="M8 12h.01"/><path d="M12 12h.01"/><path d="M16 12h.01"/>
                            </svg>
                            <h2 class="text-lg font-semibold text-[#5482B3]">Chat Via WhatsApp</h2>
                       </div>
                    </a>
                @endif
            </div>
        @else
            <p class="text-gray-600 dark:text-gray-400">
                Data wali kelas belum tersedia.
            </p>
        @endif
    </div>
@endsection
