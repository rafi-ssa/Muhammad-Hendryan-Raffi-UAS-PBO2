<?php

namespace App\Http\Controllers;

use App\Models\KasMasjid;
use Illuminate\Http\Request;

class KasController extends Controller
{
    public function index()
    {
        $kas = KasMasjid::latest()->get();
        return view('kas.index', compact('kas'));
    }

    public function create()
    {
        return view('kas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'keterangan' => 'required|string|max:255',
            'tipe' => 'required|in:masuk,keluar',
            'nominal' => 'required|numeric|min:0',
            'kategori_kas' => 'required|string',
            'tanggal' => 'required|date'
        ]);
        KasMasjid::create($validated);
        return redirect()->route('kas.index')->with('success', 'TRANSAKSI KAS TERCATAT!');
    }

    public function edit($id)
    {
        $kas = KasMasjid::findOrFail($id);
        return view('kas.edit', compact('kas'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'keterangan' => 'required|string',
            'tipe' => 'required|in:masuk,keluar',
            'nominal' => 'required|numeric',
            'tanggal' => 'required|date'
        ]);
        $kas = KasMasjid::findOrFail($id);
        $kas->update($validated);
        return redirect()->route('kas.index')->with('success', 'DATA KAS DIPERBARUI!');
    }

    public function destroy($id)
    {
        KasMasjid::findOrFail($id)->delete();
        return redirect()->route('kas.index')->with('success', 'DATA KAS DIHAPUS!');
    }
}
