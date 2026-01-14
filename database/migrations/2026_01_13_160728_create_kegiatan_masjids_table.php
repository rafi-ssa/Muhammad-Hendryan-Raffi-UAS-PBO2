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
        Schema::create('kegiatan_masjids', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->string('penceramah')->nullable();
            $table->dateTime('waktu_mulai');
            $table->string('lokasi')->default('Ruang Utama');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan_masjids');
    }
};
