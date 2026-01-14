<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kas_masjids', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan');
            $table->enum('tipe', ['masuk', 'keluar']);
            $table->bigInteger('nominal');
            $table->date('tanggal');
            $table->string('kategori_kas'); // Kas Masjid, Kas Yatim, Kas Pembangunan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kas_masjids');
    }
};
