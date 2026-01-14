<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KasMasjid extends Model
{
    protected $fillable = [
        'keterangan',
        'tipe',
        'nominal',
        'tanggal',
        'kategori_kas'
    ];

    // Casting tanggal agar otomatis menjadi objek Carbon (biar gampang diformat)
    protected $casts = [
        'tanggal' => 'date',
    ];
}
