<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\KategoriStok;
use App\Models\KasMasjid;
use App\Models\KegiatanMasjid;
use App\Models\PengurusMasjid;
use Illuminate\Support\Facades\Hash;

class MasjidSeeder extends Seeder
{
    public function run()
    {
        // 1. Akun Admin Utama
        User::create([
            'name' => 'Ketua DKM Admin',
            'email' => 'admin@masjid.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // 2. Data Kategori Barang (Stok)
        $beras = KategoriStok::create(['nama_barang' => 'Beras Zakat', 'satuan' => 'Kg', 'stok_sekarang' => 150]);
        $air = KategoriStok::create(['nama_barang' => 'Air Mineral Gelas', 'satuan' => 'Dus', 'stok_sekarang' => 25]);
        $minyak = KategoriStok::create(['nama_barang' => 'Minyak Goreng', 'satuan' => 'Liter', 'stok_sekarang' => 40]);

        // 3. Data Kas Masjid (Uang)
        KasMasjid::create([
            'keterangan' => 'Infaq Jumat Minggu Ke-1',
            'tipe' => 'masuk',
            'nominal' => 5500000,
            'tanggal' => now()->subDays(2),
            'kategori_kas' => 'Kas Umum'
        ]);
        KasMasjid::create([
            'keterangan' => 'Bayar Listrik & Air',
            'tipe' => 'keluar',
            'nominal' => 1200000,
            'tanggal' => now()->subDay(),
            'kategori_kas' => 'Operasional'
        ]);
        KasMasjid::create([
            'keterangan' => 'Sedekah Hamba Allah',
            'tipe' => 'masuk',
            'nominal' => 2000000,
            'tanggal' => now(),
            'kategori_kas' => 'Kas Anak Yatim'
        ]);

        // 4. Data Kegiatan
        // Data Kegiatan 1
        KegiatanMasjid::create([
            'nama_kegiatan' => 'Kajian Rutin Fiqih',
            'penceramah' => 'Ust. Dr. Khalid Walid',
            'waktu_mulai' => now()->addDays(2)->setHour(18)->setMinute(30),
            'lokasi' => 'Ruang Utama'
        ]);

        // Data Kegiatan 2 (Perbaikan di sini)
        KegiatanMasjid::create([
            'nama_kegiatan' => 'Santunan Yatim Piatu',
            'penceramah' => 'KH. Ahmad Dahlan',
            'waktu_mulai' => now()->addDays(5)->setHour(9)->setMinute(0), // Diubah dari 09 dan 00
            'lokasi' => 'Aula Masjid'
        ]);

        // 5. Data Pengurus
        PengurusMasjid::create([
            'nama_lengkap' => 'H. Sulaiman Efendi',
            'jabatan' => 'Ketua DKM',
            'no_hp' => '08123456789',
            'alamat' => 'Jl. Kebon Sirih No. 10'
        ]);
        PengurusMasjid::create([
            'nama_lengkap' => 'Abdullah Rozak',
            'jabatan' => 'Bendahara',
            'no_hp' => '08776655443',
            'alamat' => 'Perumahan Indah Blok C'
        ]);
    }
}
