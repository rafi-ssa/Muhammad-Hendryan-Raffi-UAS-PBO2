<?php

namespace App\Http\Controllers;

use App\Models\KategoriStok;
use Illuminate\Http\Request;

class KategoriStokController extends Controller
{
    public function index()
    {
        $stoks = KategoriStok::latest()->get();
        return view('kategori.index', compact('stoks'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'stok_sekarang' => 'required|integer|min:0'
        ]);
        KategoriStok::create($validated);
        return redirect()->route('kategori-stok.index')->with('success', 'BARANG BERHASIL DITAMBAHKAN!');
    }

    public function edit($id)
    {
        $stok = KategoriStok::findOrFail($id);
        return view('kategori.edit', compact('stok'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'stok_sekarang' => 'required|integer|min:0'
        ]);
        $stok = KategoriStok::findOrFail($id);
        $stok->update($request->all());
        return redirect()->route('kategori-stok.index')->with('success', 'DATA BARANG DIPERBARUI!');
    }

    public function destroy($id)
    {
        $stok = KategoriStok::findOrFail($id);
        $stok->delete();
        return redirect()->route('kategori-stok.index')->with('success', 'BARANG DIHAPUS!');
    }
}
