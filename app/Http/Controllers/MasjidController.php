<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Masjid;

class MasjidController extends Controller
{
    public function edit()
    {
        $masjid = auth()->user()->masjid;
        return view('masjid.edit', compact('masjid'));
    }

    public function update(Request $request)
    {
        $masjid = auth()->user()->masjid;

        $request->validate([
            'name' => 'required',
            'alamat' => 'nullable',
            'visi' => 'nullable',
            'misi' => 'nullable',
            'kontak' => 'nullable',
            'logo' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            $masjid->logo = $path;
        }

        $masjid->update([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'kontak' => $request->kontak,
        ]);

        // handle logo update manually because $masjid->update might not cover the manual object assignment correctly unless saved
        $masjid->save();

        return redirect()->back()->with('success', 'Profil Masjid berhasil diperbarui');
    }
}
