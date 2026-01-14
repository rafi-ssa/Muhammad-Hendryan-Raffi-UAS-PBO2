<?php

namespace App\Http\Controllers;

use App\Models\KegiatanMasjid;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = KegiatanMasjid::orderBy('waktu_mulai', 'asc')->get();
        return view('kegiatan.index', compact('kegiatan'));
    }

    public function create()
    {
        return view('kegiatan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'penceramah' => 'nullable|string',
            'waktu_mulai' => 'required|date',
            'lokasi' => 'required|string'
        ]);
        KegiatanMasjid::create($validated);
        return redirect()->route('kegiatan.index')->with('success', 'KEGIATAN TERJADWAL!');
    }

    public function edit($id)
    {
        $kegiatan = KegiatanMasjid::findOrFail($id);
        return view('kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, $id)
    {
        $kegiatan = KegiatanMasjid::findOrFail($id);
        $kegiatan->update($request->all());
        return redirect()->route('kegiatan.index')->with('success', 'JADWAL DIPERBARUI!');
    }

    public function destroy($id)
    {
        KegiatanMasjid::findOrFail($id)->delete();
        return redirect()->route('kegiatan.index')->with('success', 'KEGIATAN DIHAPUS!');
    }
}
