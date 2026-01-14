<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KasMasjid;
use App\Models\LogistikMasjid;
use App\Models\KegiatanMasjid;
use App\Models\PengurusMasjid;

class PublicController extends Controller
{
    public function index()
    {
        // 1. Logika Saldo (Sama dengan Dashboard)
        $pemasukan = KasMasjid::where('tipe', 'masuk')->sum('nominal');
        $pengeluaran = KasMasjid::where('tipe', 'keluar')->sum('nominal');
        $saldoTotal = $pemasukan - $pengeluaran;

        // 2. Daftar Kas Terakhir (Untuk ditampilkan di tabel publik)
        $kas_list = KasMasjid::orderBy('id', 'desc')->take(5)->get();

        // 3. Agenda Terdekat
        $agenda = KegiatanMasjid::where('waktu_mulai', '>=', now())
            ->orderBy('waktu_mulai', 'asc')
            ->take(4)
            ->get();

        // 4. Data Pengurus & Logistik
        $pengurus = PengurusMasjid::all();
        $logistik = LogistikMasjid::where('status', 'tersedia')->take(6)->get();

        // Kirim data ke view welcome
        return view('landing', compact(
            'saldoTotal',
            'kas_list',
            'agenda',
            'pengurus',
            'logistik'
        ));
    }
}
