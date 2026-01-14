<?php

namespace App\Http\Controllers;

use App\Models\LogistikMasjid;
use App\Models\KasMasjid;
use App\Models\KategoriStok;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function cetak()
    {
        $kas = KasMasjid::latest()->get();
        $totalMasuk = $kas->where('tipe', 'masuk')->sum('nominal');
        $totalKeluar = $kas->where('tipe', 'keluar')->sum('nominal');
        $saldoAkhir = $totalMasuk - $totalKeluar;

        $logistik = LogistikMasjid::with('kategori')->latest()->get();
        $stokAset = KategoriStok::all();

        return view('laporan.cetak-pdf', compact('kas', 'totalMasuk', 'totalKeluar', 'saldoAkhir', 'logistik', 'stokAset'));
    }
}
