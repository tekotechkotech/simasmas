<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Keuangan;

class KeuanganController extends Controller
{
    public function index()
    {
        $masjidId = auth()->user()->masjid_id;
        $keuangans = Keuangan::where('masjid_id', $masjidId)->orderBy('tanggal', 'desc')->get();

        $totalSaldo = Keuangan::where('masjid_id', $masjidId)
            ->selectRaw('SUM(CASE WHEN jenis = "pemasukan" THEN nominal ELSE -nominal END) as total')
            ->value('total') ?? 0;

        $pemasukanBulanIni = Keuangan::where('masjid_id', $masjidId)
            ->where('jenis', 'pemasukan')
            ->whereMonth('tanggal', date('m'))
            ->whereYear('tanggal', date('Y'))
            ->sum('nominal');

        $pengeluaranBulanIni = Keuangan::where('masjid_id', $masjidId)
            ->where('jenis', 'pengeluaran')
            ->whereMonth('tanggal', date('m'))
            ->whereYear('tanggal', date('Y'))
            ->sum('nominal');

        return view('keuangan.index', compact('keuangans', 'totalSaldo', 'pemasukanBulanIni', 'pengeluaranBulanIni'));
    }

    public function create(Request $request)
    {
        $jenis = $request->query('jenis', 'pemasukan');
        return view('keuangan.create', compact('jenis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|in:pemasukan,pengeluaran',
            'nominal' => 'required|numeric|min:1',
            'tanggal' => 'required|date',
        ]);

        Keuangan::create([
            'masjid_id' => auth()->user()->masjid_id,
            'jenis' => $request->jenis,
            'nominal' => $request->nominal,
            'kategori' => $request->kategori,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('keuangan.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function destroy(Keuangan $keuangan)
    {
        if ($keuangan->masjid_id === auth()->user()->masjid_id) {
            $keuangan->delete();
        }
        return redirect()->back()->with('success', 'Transaksi berhasil dihapus');
    }
}
