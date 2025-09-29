<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    {{-- <body class="font-sans antialiased">
        <div class="min-h-screen bg-[#EFF5FE] 
         @if (auth()->check() && auth()->user()->role === 'siswa')
         
         @elseif (auth()->check() && in_array(auth()->user()->role, ['admin', 'petugas']))
         md:flex
         @endif
         ">

            <!-- Sidebar berdasarkan role -->
            @if(auth()->check() && in_array(auth()->user()->role, ['admin', 'petugas']))
                <div class="md:hidden bg-[#5F9EF2] w-full h-16 p-6 text-center fixed top-0 right-0 left-0 z-10 text-white">
                    <div class="flex-1 flex gap-1 justify-between">
                        <button @click="sidebarIsOpen = true" class="text-white ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-panel-right-icon lucide-panel-right"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M15 3v18"/></svg>                        </button>
                        <div class="flex justify-between gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-scan-qr-code-icon lucide-scan-qr-code text-white"><path d="M17 12v4a1 1 0 0 1-1 1h-4"/><path d="M17 3h2a2 2 0 0 1 2 2v2"/><path d="M17 8V7"/><path d="M21 17v2a2 2 0 0 1-2 2h-2"/><path d="M3 7V5a2 2 0 0 1 2-2h2"/><path d="M7 17h.01"/><path d="M7 21H5a2 2 0 0 1-2-2v-2"/><rect x="7" y="7" width="5" height="5" rx="1"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bell-icon lucide-bell text-white"><path d="M10.268 21a2 2 0 0 0 3.464 0"/><path d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"/>
                            </svg>
                        </div>
                    </div>
                    
                </div>

                @include('layouts.partials.nav-admin')
            @elseif(auth()->check() && auth()->user()->role === 'siswa')
                @include('layouts.partials.nav-siswa')
            @endif

            <!-- Main Content -->
            <main class="p-6 pb-24 
                @if(auth()->check() && array(auth()->user()->role, ['admin', 'petugas']))
                md:flex-1 md:mt-0 
                @elseif(auth()->check() && auth()->user()->role === 'siswa')
                    mt-6 md:mt-0
                @endif
            ">
                {{ $slot }}
            </main>
        </div>
        <script src="//unpkg.com/alpinejs" defer></script>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const notifButton = document.getElementById('notifikasi-button');
            const notifDropdown = document.getElementById('notifikasi-dropdown');
    
            if (notifButton && notifDropdown) {
                notifButton.addEventListener('click', function(event) {
                    event.stopPropagation();
                    notifDropdown.classList.toggle('hidden');
                });
    
                document.addEventListener('click', function(event) {
                    if (!notifButton.contains(event.target) && !notifDropdown.contains(event.target)) {
                        notifDropdown.classList.add('hidden');
                    }
                });
            }
        });
    </script>
    </body> --}}
    <body class="font-poppins antialiased">
        @if(auth()->check() && in_array(auth()->user()->role, ['admin', 'petugas']))
        <div x-data="{ sidebarIsOpen: false }" class="relative flex w-full min-h-screen flex-col md:flex-row bg-[#EFF5FE]">
            <div x-cloak x-show="sidebarIsOpen" 
                 class="fixed inset-0 z-40 bg-black/50 md:hidden" 
                 aria-hidden="true" 
                 x-on:click="sidebarIsOpen = false" 
                 x-transition.opacity>
            </div>

            @include('layouts.partials.nav-admin')

            <div class="w-full overflow-y-auto bg-[#EFF5FE] flex flex-col md:flex-1">
                
                <nav class="sticky top-0 z-30 flex items-center justify-between bg-[#5F9EF2] text-white px-4 py-3 shadow-md md:hidden" 
                     aria-label="Mobile Top Nav">
                    
                    {{-- KIRI: Tombol Toggle Menu Sidebar --}}
                    <button type="button" 
                            class="text-white p-1 rounded hover:bg-blue-700" 
                            x-on:click="sidebarIsOpen = true"> {{-- KUNCI: Membuka sidebar --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><path d="M3 12h18"/><path d="M3 6h18"/><path d="M3 18h18"/></svg>
                    </button>
                    
                    {{-- KANAN: Aksi Cepat (QR Scan & Notifikasi) --}}
                    <div class="flex items-center space-x-3">
                        
                        {{-- QR Scan Shortcut --}}
                        <a href="{{ route('admin.izin.scanner') ?? '#' }}" class="p-1 rounded-full hover:bg-blue-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-scan-qr-code-icon lucide-scan-qr-code text-white"><path d="M17 12v4a1 1 0 0 1-1 1h-4"/><path d="M17 3h2a2 2 0 0 1 2 2v2"/><path d="M17 8V7"/><path d="M21 17v2a2 2 0 0 1-2 2h-2"/><path d="M3 7V5a2 2 0 0 1 2-2h2"/><path d="M7 17h.01"/><path d="M7 21H5a2 2 0 0 1-2-2v-2"/><rect x="7" y="7" width="5" height="5" rx="1"/></svg>
                        </a>
                        
                        {{-- Notifikasi --}}
                        <a href="#" class="p-1 rounded-full hover:bg-blue-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bell-icon lucide-bell text-white"><path d="M10.268 21a2 2 0 0 0 3.464 0"/><path d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"/></svg>
                        </a>
                    </div>
                </nav>
                
                <main class="flex-1 p-6 pb-3">
                    {{ $slot }}
                </main>
            </div>
        </div>

        @else
        <div class="min-h-screen bg-[#EFF5FE]">
            @if(auth()->check() && auth()->user()->role === 'siswa')
                {{-- NavBar Siswa Anda yang TIDAK DIUBAH --}}
                @include('layouts.partials.nav-siswa')
                <main class="p-6 pb-24  md:mt-0">
                    {{ $slot }}
                </main>
        </div>
        @endif
        @endif
    <script src="//unpkg.com/alpinejs" defer></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const notifButton = document.getElementById('notifikasi-button');
            const notifDropdown = document.getElementById('notifikasi-dropdown');
    
            if (notifButton && notifDropdown) {
                notifButton.addEventListener('click', function(event) {
                    event.stopPropagation();
                    notifDropdown.classList.toggle('hidden');
                });
    
                document.addEventListener('click', function(event) {
                    if (!notifButton.contains(event.target) && !notifDropdown.contains(event.target)) {
                        notifDropdown.classList.add('hidden');
                    }
                });
            }
        });
    </script>
    </body>
</html>
