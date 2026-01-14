<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KegiatanMasjid extends Model
{
    // Memastikan model ini hanya mengakses tabel kegiatan_masjids
    protected $table = 'kegiatan_masjids';

    protected $fillable = [
        'nama_kegiatan',
        'penceramah',
        'waktu_mulai',
        'waktu_selesai',
        'lokasi'
    ];

    // Mengonversi string database menjadi objek waktu Carbon
    protected $casts = [
        'waktu_mulai' => 'datetime',
        'waktu_selesai' => 'datetime',
    ];
}
