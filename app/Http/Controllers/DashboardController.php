<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KasMasjid;
use App\Models\LogistikMasjid;
use App\Models\KegiatanMasjid;
use App\Models\PengurusMasjid;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Menghitung Saldo Kas
        // Mencari total nominal berdasarkan tipe 'masuk' dan 'keluar'
        $pemasukan = KasMasjid::where('tipe', 'masuk')->sum('nominal');
        $pengeluaran = KasMasjid::where('tipe', 'keluar')->sum('nominal');

        // Variabel disamakan dengan Blade: $saldoTotal
        $saldoTotal = $pemasukan - $pengeluaran;

        // 2. Menghitung Logistik Pending
        // Mencari jumlah item yang statusnya masih 'rencana'
        // Variabel disamakan dengan Blade: $barangRencana
        $barangRencana = LogistikMasjid::where('status', 'rencana')->count();

        // 3. Statistik Lainnya
        $total_pengurus = PengurusMasjid::count();
        $total_kegiatan = KegiatanMasjid::where('waktu_mulai', '>=', now())->count();

        // 4. Mengambil 5 Agenda Terdekat
        // Pastikan model KegiatanMasjid sudah menggunakan 'protected $casts = ['waktu_mulai' => 'datetime']'
        $kegiatan_terdekat = KegiatanMasjid::where('waktu_mulai', '>=', now())
            ->orderBy('waktu_mulai', 'asc')
            ->take(5)
            ->get();

        // 5. Kirim data ke View
        return view('dashboard', compact(
            'saldoTotal',
            'barangRencana',
            'total_pengurus',
            'total_kegiatan',
            'kegiatan_terdekat'
        ));
    }
}
