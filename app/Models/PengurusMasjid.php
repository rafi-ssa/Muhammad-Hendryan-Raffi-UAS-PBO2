<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengurusMasjid extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'jabatan',
        'no_hp',
        'alamat'
    ];
}
