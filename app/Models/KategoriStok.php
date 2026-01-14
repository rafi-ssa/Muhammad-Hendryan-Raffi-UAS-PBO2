<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriStok extends Model
{
    protected $fillable = ['nama_barang', 'satuan', 'stok_sekarang'];

    // Relasi: Satu kategori barang bisa punya banyak riwayat logistik masuk
    public function logistik()
    {
        return $this->hasMany(LogistikMasjid::class, 'kategori_stok_id');
    }
}
