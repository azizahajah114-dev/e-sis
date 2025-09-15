<x-app-layout>
    <div class="max-w-lg mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-200">
            Ubah Password
        </h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('siswa.profil.pengaturan.password.update') }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            {{-- Password Lama --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password Lama</label>
                <div class="relative">
                    <input type="password" id="old_password" name="old_password"
                           value="12345678" readonly
                           class="mt-1 block w-full pr-10 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:text-white" required>
                    <button type="button" onclick="togglePassword('old_password', this)" 
                            class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-500">
                        👁️
                    </button>
                </div>
            </div>

            {{-- Password Baru --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password Baru</label>
                <div class="relative">
                    <input type="password" id="password" name="password"
                           class="mt-1 block w-full pr-10 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:text-white" required>
                    <button type="button" onclick="togglePassword('password', this)" 
                            class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-500">
                        👁️
                    </button>
                </div>
            </div>

            {{-- Konfirmasi Password Baru --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Konfirmasi Password Baru</label>
                <div class="relative">
                    <input type="password" id="password_confirmation" name="password_confirmation"
                           class="mt-1 block w-full pr-10 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:text-white" required>
                    <button type="button" onclick="togglePassword('password_confirmation', this)" 
                            class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-500">
                        👁️
                    </button>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end gap-3">
                <a href="{{ route('siswa.profil.pengaturan') }}"
                   class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                    Batal
                </a>
                <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Simpan Password
                </button>
            </div>
        </form>
    </div>

    {{-- Script Show/Hide Password --}}
    <script>
        function togglePassword(fieldId, button) {
            const input = document.getElementById(fieldId);
            if (input.type === "password") {
                input.type = "text";
                button.textContent = "🙈";
            } else {
                input.type = "password";
                button.textContent = "👁️";
            }
        }
    </script>
</x-app-layout>
