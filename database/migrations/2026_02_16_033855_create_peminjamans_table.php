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
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id('id_pinjam');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_buku');
            $table->date('tgl_pinjam');
            $table->integer('durasi');
            $table->date('tgl_kembali');
            $table->date('tgl_pengembalian_asli')->nullable();
            $table->enum('status', ['Dipinjam', 'Kembali'])->default('Dipinjam');
            $table->integer('denda')->default(0);
            $table->enum('status_denda', ['Tanpa Denda', 'Belum Bayar', 'Lunas'])->default('Tanpa Denda');
            $table->timestamps();

            // Pastikan kolom id_user di tabel users adalah 'id_user' juga, jika 'id' ganti dibawah ini
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('id_buku')->references('id_buku')->on('bukus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamans');
    }
};
