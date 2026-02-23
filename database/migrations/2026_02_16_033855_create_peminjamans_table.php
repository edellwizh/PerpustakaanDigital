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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kode_buku');
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali')->nullable();
            $table->enum('status', ['dipinjam', 'dikembalikan'])->default('dipinjam');
            $table->timestamps();
            $table->softDeletes();

            // Pastikan kolom user_id di tabel users adalah 'user_id' juga, jika 'id' ganti dibawah ini
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('kode_buku')->references('kode_buku')->on('bukus')->onDelete('cascade');
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
