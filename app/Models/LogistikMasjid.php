<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistikMasjid extends Model
{
    protected $fillable = [
        'kategori_stok_id',
        'jumlah_masuk',
        'pemberi',
        'status',
        'tanggal_tiba'
    ];

    // Relasi: Logistik ini merujuk ke satu kategori barang
    public function kategori()
    {
        return $this->belongsTo(KategoriStok::class, 'kategori_stok_id');
    }

    protected $casts = [
        'tanggal_tiba' => 'date', // atau 'datetime' jika ada jamnya
    ];
}
