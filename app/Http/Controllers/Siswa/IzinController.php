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

class IzinController extends Controller
{
    // Tampilkan form izin (tahap 1)
    public function create()
    {
        $siswa = Auth::user();
        $izin = Izin::where('user_id', $siswa->id)->latest()->first();

        if ($izin && ($izin->status_izin === 'baru' || $izin->status_izin === 'menunggu_validasi')) {
            return redirect()->route('izin.upload.form', $izin->id)
                ->with('success', 'Silakan upload bukti foto.');
        }

        $walikelas = $siswa->walikelas;

        return view('siswa.izin.create', compact('siswa', 'walikelas'));
    }



    // Simpan izin (tahap 1)
    public function store(Request $request)
    {
        $request->validate([
            'nis'          => 'required|exists:users,nis',
            'jenis_izin'   => 'required|in:sakit,izin',
            'keterangan'   => 'nullable|string',
            'jam_keluar'   => 'required',
            'id_walikelas' => 'required|exists:walikelas,id',
        ]);

        // cari user dari NIS
        $user = User::where('nis', $request->nis)->first();

        // ambil petugas aktif (misal 1 orang saja yang statusnya aktif)
        $petugas = Petugas::where('status', 'aktif')
            ->first();

        if (!$petugas) {
            return back()->with('error', 'Tidak ada petugas aktif, hubungi admin.');
        }

        // buat izin baru
        $izin = Izin::create([
            'user_id'      => $user->id,
            'id_walikelas' => $request->id_walikelas,
            'jenis_izin'   => $request->jenis_izin,
            'keterangan'   => $request->keterangan,
            'jam_keluar'   => $request->jam_keluar,
            'tanggal'      => now()->toDateString(),
            'status_izin'  => 'baru',
        ]);

        // generate qr code berisi url cetak + id walikelas & id petugas
        $qrCodeUrl = route('siswa.izin.cetak', $izin->id) .
            '?id_walikelas=' . $izin->id_walikelas .
            '&id_petugas=' . $petugas->id;

        $result = Builder::create()
            ->writer(new PngWriter())   // pastikan pakai PNG writer
            ->data($qrCodeUrl)
            ->size(200)
            ->margin(10)
            ->build();

        // simpan ke storage
        $qrCodePath = 'qrcodes/izin_' . $izin->id . '.png';
        Storage::disk('public')->put($qrCodePath, $result->getString());

        // update path ke DB
        $izin->update([
            'qr_code' => $qrCodePath,
        ]);

        return redirect()->route('siswa.izin.qr', $izin->id)
            ->with('success', 'Pengajuan izin berhasil, silakan cetak lembar izin.');
    }

    public function showQr($id)
    {
        $izin = Izin::findOrFail($id);

        return view('siswa.izin.qr', compact('izin'));
    }

    public function cetak($id, Request $request)
    {
        $izin = Izin::with(['user', 'walikelas.kelas'])->findOrFail($id);

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
