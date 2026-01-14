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
        Schema::create('logistik_masjids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_stok_id')->constrained('kategori_stoks')->onDelete('cascade');
            $table->integer('jumlah_masuk');
            $table->string('pemberi')->nullable(); // Nama donatur
            $table->enum('status', ['rencana', 'diterima'])->default('rencana');
            $table->dateTime('tanggal_tiba');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logistik_masjids');
    }
};
