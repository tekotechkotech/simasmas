<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Laporan;
use App\Models\Keuangan;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = Laporan::where('masjid_id', auth()->user()->masjid_id)->orderBy('tahun', 'desc')->orderBy('bulan', 'desc')->get();
        return view('laporan.index', compact('laporans'));
    }

    public function create()
    {
        return view('laporan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2000',
        ]);

        Laporan::create([
            'masjid_id' => auth()->user()->masjid_id,
            'judul' => 'Laporan Keuangan ' . date('F', mktime(0, 0, 0, $request->bulan, 10)) . ' ' . $request->tahun,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'generated_at' => now(),
        ]);

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dibuat. Klik icon unduh untuk mendapatkan file PDF.');
    }

    public function generatePdf(Laporan $laporan)
    {
        if ($laporan->masjid_id !== auth()->user()->masjid_id)
            abort(403);

        $keuangans = Keuangan::where('masjid_id', $laporan->masjid_id)
            ->whereMonth('tanggal', $laporan->bulan)
            ->whereYear('tanggal', $laporan->tahun)
            ->orderBy('tanggal')
            ->get();

        $masjid = auth()->user()->masjid;

        $pdf = Pdf::loadView('laporan.pdf', compact('laporan', 'keuangans', 'masjid'));
        return $pdf->stream('Laporan_Keuangan_' . $laporan->bulan . '_' . $laporan->tahun . '.pdf');
    }

    public function generateExcel(Laporan $laporan)
    {
        if ($laporan->masjid_id !== auth()->user()->masjid_id)
            abort(403);

        $keuangans = Keuangan::where('masjid_id', $laporan->masjid_id)
            ->whereMonth('tanggal', $laporan->bulan)
            ->whereYear('tanggal', $laporan->tahun)
            ->orderBy('tanggal')
            ->get();

        $masjid = auth()->user()->masjid;

        return \Maatwebsite\Excel\Facades\Excel::download(
            new \App\Exports\KeuanganExport($laporan, $keuangans, $masjid),
            'Laporan_Keuangan_' . $laporan->bulan . '_' . $laporan->tahun . '.xlsx'
        );
    }

    public function destroy(Laporan $laporan)
    {
        if ($laporan->masjid_id === auth()->user()->masjid_id) {
            $laporan->delete();
        }
        return redirect()->back()->with('success', 'Laporan dihapus');
    }
}
