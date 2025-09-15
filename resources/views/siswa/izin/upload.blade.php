<x-app-layout>
    <div class="p-6">
        <h1 class="text-xl font-bold mb-4">Upload Bukti Izin</h1>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <p><strong>Jenis Izin:</strong> {{ ucfirst($izin->jenis_izin) }}</p>
        <p><strong>Keterangan:</strong> {{ $izin->keterangan }}</p>

        @if($izin->bukti_izin)
            <div class="mt-4">
                <p class="font-semibold">Bukti sudah diunggah:</p>
                <img src="{{ asset('storage/' . $izin->bukti_izin) }}" 
                     alt="Bukti Izin" class="w-48 border rounded">
            </div>
        @else
            <form action="{{ route('izin.upload', $izin->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
                @csrf
                <label class="block mb-2 font-semibold">Upload Bukti (jpg, png):</label>
                <input type="file" name="bukti_izin" class="border p-2 w-full @error('bukti_izin') border-red-500 @enderror">
                @error('bukti_izin')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror

                <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded">
                    Upload
                </button>
            </form>
        @endif
    </div>
</x-app-layout>
