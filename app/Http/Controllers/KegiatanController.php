<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kegiatan;

class KegiatanController extends Controller
{
    public function index()
    {
        $masjidId = auth()->user()->masjid_id;
        $kegiatans = Kegiatan::where('masjid_id', $masjidId)->orderBy('tanggal', 'desc')->get();

        $totalKegiatan = Kegiatan::where('masjid_id', $masjidId)->count();

        $kegiatanMendatang = Kegiatan::where('masjid_id', $masjidId)
            ->whereDate('tanggal', '>=', date('Y-m-d'))
            ->count();

        $kegiatanSelesai = Kegiatan::where('masjid_id', $masjidId)
            ->whereDate('tanggal', '<', date('Y-m-d'))
            ->count();

        return view('kegiatan.index', compact('kegiatans', 'totalKegiatan', 'kegiatanMendatang', 'kegiatanSelesai'));
    }

    public function create()
    {
        return view('kegiatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tanggal' => 'required|date',
        ]);

        Kegiatan::create([
            'masjid_id' => auth()->user()->masjid_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'lokasi' => $request->lokasi,
        ]);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        if ($kegiatan->masjid_id === auth()->user()->masjid_id) {
            $kegiatan->delete();
        }
        return redirect()->back()->with('success', 'Kegiatan berhasil dihapus');
    }
}
