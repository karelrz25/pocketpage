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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->bigInteger('id_penulis')->nullable();
            $table->string('penerbit')->nullable();
            $table->string('tahun_terbit')->nullable();
            $table->string('tebal')->nullable();
            $table->string('isbn')->nullable();
            $table->string('cover');
            $table->string('pdf')->nullable();
            $table->string('path')->nullable();
            $table->enum('status', ['I', 'T']);
            $table->bigInteger('id_kategori');
            $table->string('sinopsis');
            $table->enum('rekomendasi', ['I', 'T', 'P']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
