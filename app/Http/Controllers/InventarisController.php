<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Inventaris;

class InventarisController extends Controller
{
    public function index()
    {
        $masjidId = auth()->user()->masjid_id;
        $inventaris = Inventaris::where('masjid_id', $masjidId)->orderBy('nama')->get();
        return view('inventaris.index', compact('inventaris'));
    }

    public function create()
    {
        return view('inventaris.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jumlah' => 'required|integer|min:1',
            'kondisi' => 'required'
        ]);

        Inventaris::create([
            'masjid_id' => auth()->user()->masjid_id,
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
            'kondisi' => $request->kondisi,
        ]);

        return redirect()->route('inventaris.index')->with('success', 'Data Inventaris berhasil ditambahkan');
    }

    public function destroy(Inventaris $inventaris)
    {
        if ($inventaris->masjid_id === auth()->user()->masjid_id) {
            $inventaris->delete();
        }
        return redirect()->back()->with('success', 'Inventaris dihapus');
    }
}
