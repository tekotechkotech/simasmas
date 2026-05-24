<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Jamaah;

class JamaahController extends Controller
{
    public function index()
    {
        $masjidId = auth()->user()->masjid_id;
        $jamaahs = Jamaah::where('masjid_id', $masjidId)->orderBy('nama')->get();
        return view('jamaah.index', compact('jamaahs'));
    }

    public function create()
    {
        return view('jamaah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        Jamaah::create([
            'masjid_id' => auth()->user()->masjid_id,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'rt' => $request->rt,
            'rw' => $request->rw,
        ]);

        return redirect()->route('jamaah.index')->with('success', 'Data Jamaah berhasil ditambahkan');
    }

    public function destroy(Jamaah $jamaah)
    {
        if ($jamaah->masjid_id === auth()->user()->masjid_id) {
            $jamaah->delete();
        }
        return redirect()->back()->with('success', 'Data Jamaah dihapus');
    }

    public function edit(Jamaah $jamaah)
    {
        if ($jamaah->masjid_id !== auth()->user()->masjid_id)
            abort(403);
        return view('jamaah.edit', compact('jamaah'));
    }

    public function update(Request $request, Jamaah $jamaah)
    {
        if ($jamaah->masjid_id !== auth()->user()->masjid_id)
            abort(403);

        $request->validate([
            'nama' => 'required',
        ]);

        $jamaah->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'rt' => $request->rt,
            'rw' => $request->rw,
        ]);

        return redirect()->route('jamaah.index')->with('success', 'Data Jamaah berhasil diperbarui');
    }
}
