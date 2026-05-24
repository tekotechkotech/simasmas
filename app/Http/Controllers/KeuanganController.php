<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Keuangan;

class KeuanganController extends Controller
{
    public function index()
    {
        $keuangans = Keuangan::where('masjid_id', auth()->user()->masjid_id)->get();
        return view('keuangan.index', compact('keuangans'));
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

        return redirect()->route('dashboard')->with('success', 'Transaksi berhasil ditambahkan');
    }
}
