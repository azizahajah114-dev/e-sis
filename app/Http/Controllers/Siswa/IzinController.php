<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Izin;
use App\Models\Petugas;
use App\Models\SiswaLengkap;
use App\Models\User;
use App\Models\WaliKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

class IzinController extends Controller
{
    // Tampilkan form izin (tahap 1)
    public function create()
    {
        $siswa = Auth::user();
        $izin = Izin::where('user_id', $siswa->id)->latest()->first();

        if ($izin) {
            if ($izin->status_izin === 'baru') {
                // Masih tahap QR, arahkan ke halaman QR
                return redirect()->route('siswa.izin.qr', [
                    'id' => $izin->id,
                    'token' => $izin->token,
                ]);
            } elseif (in_array($izin->status_izin, ['menunggu_validasi', 'menunggu_bukti'])) {
                // Setelah discan, baru bisa upload bukti
                return redirect()->route('izin.upload.form', $izin->id)
                    ->with('success', 'Silakan upload bukti foto.');
            }
        }


        $walikelas = $siswa->walikelas;

        return view('siswa.izin.create', compact('siswa', 'walikelas'));
    }



    // Simpan izin (tahap 1)
    public function store(Request $request)
    {
        $request->validate([
            'jenis_izin' => 'required|string',
            'keterangan' => 'nullable|string',
            'jam_keluar' => 'required',
            'id_walikelas' => 'required|exists:walikelas,id',
        ]);

        $user = auth()->user();

        // Buat token unik
        $token = Str::random(10);

        $izin = Izin::create([
            'user_id' => $user->id,
            'id_walikelas' => $request->id_walikelas,
            'jenis_izin' => $request->jenis_izin,
            'keterangan' => $request->keterangan,
            'jam_keluar' => $request->jam_keluar,
            'tanggal' => now()->format('Y-m-d'),
            'status_izin' => 'baru',
            'token' => $token,
        ]);

        // Generate URL QR dengan id_walikelas, id_petugas (optional), dan token
        $url = route('admin.izin.cetak', [
            'id' => $izin->id,
            'token' => $izin->token,
        ], true) . '?id_walikelas=' . $izin->id_walikelas;


        $qrPath = 'qr_codes/izin_' . $izin->id . '.png';

        $result = Builder::create()
            ->writer(new PngWriter()) // pakai PngWriter, nggak butuh Imagick
            ->data($url)
            ->size(300)
            ->margin(20)
            ->build();

        // simpan file ke storage
        Storage::disk('public')->put($qrPath, $result->getString());

        // update izin
        $izin->update(['qr_code' => $qrPath]);

        // Redirect ke halaman QR
        return redirect()->route('siswa.izin.qr', [
            'id' => $izin->id,
            'token' => $izin->token, // tambahkan token
        ])->with('success', 'Izin berhasil diajukan!');
    }


    public function showQr($id, $token)
    {
        $izin = Izin::where('id', $id)->where('token', $token)->firstOrFail();
        return view('siswa.izin.qr', compact('izin'));
    }


    public function cetak($id, Request $request, $token)
    {
        $izin = Izin::with(['user', 'walikelas.kelas'])->findOrFail($id);

        // validasi token
        if ($izin->token !== $token) {
            abort(403, 'Token tidak valid!');
        }

        // // pastikan hanya admin/petugas yang boleh akses
        // if (!in_array(Auth::user()->role, ['admin', 'petugas'])) {
        //     abort(403, 'Akses ditolak');
        // }

        // ambil walikelas dari relasi izin
        $walikelas = $izin->walikelas;

        // ambil petugas dari query string
        $id_petugas = $request->query('id_petugas');
        $petugas = $id_petugas ? Petugas::with('user')->find($id_petugas) : null;

        // render blade ke PDF
        $pdf = Pdf::loadView('siswa.izin.cetak', compact('izin', 'walikelas', 'petugas'));

        // Bisa pilih salah satu:
        // 1. Stream -> tampil di browser
        return $pdf->stream('izin_' . $izin->id . '.pdf');

        // 2. Download langsung
        // return $pdf->download('izin_' . $izin->id . '.pdf');
    }

    // Form upload bukti izin (tahap 2)
    public function uploadForm(Izin $izin)
    {
        return view('siswa.izin.upload', compact('izin'));
    }

    // Proses upload bukti izin
    public function uploadBukti(Request $request, Izin $izin)
    {
        $request->validate([
            'bukti_izin' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // simpan file
        $path = $request->file('bukti_izin')->store('bukti_izin', 'public');

        // update izin
        $izin->update([
            'bukti_izin' => $path,
            'status_izin' => 'menunggu_validasi'
        ]);

        return redirect()->route('izin.upload.form', $izin->id)
            ->with('success', 'Bukti izin berhasil diunggah.');
    }

    public function riwayat()
    {
        $siswa = Auth::user();

        // Ambil semua izin milik siswa yang login
        $riwayat = Izin::where('user_id', $siswa->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('siswa.izin.riwayat', compact('riwayat'));
    }
}
