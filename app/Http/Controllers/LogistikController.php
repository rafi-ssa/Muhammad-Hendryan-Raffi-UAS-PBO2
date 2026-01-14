<?php

namespace App\Http\Controllers;

use App\Models\LogistikMasjid;
use App\Models\KategoriStok;
use Illuminate\Http\Request;

class LogistikController extends Controller
{
    public function index()
    {
        $logistik = LogistikMasjid::with('kategori')->latest()->get();
        return view('logistik.index', compact('logistik'));
    }

    public function create()
    {
        $kategori = KategoriStok::all();
        return view('logistik.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_stok_id' => 'required|exists:kategori_stoks,id',
            'jumlah_masuk' => 'required|integer|min:1',
            'pemberi' => 'nullable|string|max:255',
            'status' => 'required|in:rencana,diterima',
            'tanggal_tiba' => 'required|date',
        ]);

        $logistik = LogistikMasjid::create($request->all());

        if ($request->status == 'diterima') {
            KategoriStok::find($request->kategori_stok_id)->increment('stok_sekarang', $request->jumlah_masuk);
        }

        return redirect()->route('logistik.index')->with('success', 'LOGISTIK BERHASIL DICATAT!');
    }

    public function edit($id)
    {
        $logistik = LogistikMasjid::findOrFail($id);
        $kategori = KategoriStok::all();
        return view('logistik.edit', compact('logistik', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $logistik = LogistikMasjid::findOrFail($id);

        // Logika: Jika status berubah ke 'diterima', tambah stok utama
        if ($logistik->status != 'diterima' && $request->status == 'diterima') {
            KategoriStok::find($logistik->kategori_stok_id)->increment('stok_sekarang', $logistik->jumlah_masuk);
        }

        $logistik->update($request->all());
        return redirect()->route('logistik.index')->with('success', 'DATA LOGISTIK DIPERBARUI!');
    }

    public function destroy($id)
    {
        $logistik = LogistikMasjid::findOrFail($id);
        // Jika sudah diterima, maka saat dihapus stok dikurangi kembali
        if ($logistik->status == 'diterima') {
            KategoriStok::find($logistik->kategori_stok_id)->decrement('stok_sekarang', $logistik->jumlah_masuk);
        }
        $logistik->delete();
        return redirect()->route('logistik.index')->with('success', 'DATA LOGISTIK DIHAPUS!');
    }
}
