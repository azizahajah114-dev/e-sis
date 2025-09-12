<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Izin;
use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;

class IzinController extends Controller
{
    public function index(Request $request)
    {
        $query = Izin::with(['user', 'user.siswaLengkap.kelas', 'user.siswaLengkap.jurusan']);

        // Filter jurusan
        if ($request->filled('jurusan_id')) {
            $query->whereHas('user.siswaLengkap', function ($q) use ($request) {
                $q->where('jurusan_id', $request->jurusan_id);
            });
        }

        // Filter kelas
        if ($request->filled('kelas_id')) {
            $query->whereHas('user.siswaLengkap', function ($q) use ($request) {
                $q->where('kelas_id', $request->kelas_id);
            });
        }

        // Filter status izin
        if ($request->filled('status_izin')) {
            $query->where('status_izin', $request->status_izin);
        }

        $izin = $query->latest()->paginate(10);

        $jurusan = Jurusan::all();
        $kelas   = Kelas::all();

        return view('admin.izin.index', compact('izin', 'jurusan', 'kelas'));
    }
}
