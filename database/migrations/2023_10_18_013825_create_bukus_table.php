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
            $table->bigInteger('id_penulis');
            $table->string('penerbit')->nullable();
            $table->string('tahun_terbit')->nullable();
            $table->string('tebal')->nullable();
            $table->string('isbn')->nullable();
            $table->string('cover');
            $table->string('pdf')->nullable();
            $table->enum('status', ['I', 'T', 'P']);
            $table->bigInteger('id_kategori');
            $table->string('sinopsis');
            $table->enum('rekomendasi', ['I', 'T']);
            $table->timestamps();
        });


         // Insert a new dokter
        DB::table('bukus')->insert([
            'judul' => 'buku horor',
            'id_penulis' => '1',
            'penerbit' => '',
            'tahun_terbit' => '',
            'tebal' => '',
            'isbn' => '',
            'cover' => 'cover.jpg',
            'pdf' => '',
            'status' => 'I',
            'id_kategori' => '1',
            'sinopsis' => 'buku ini menceritaan',
            'rekomendasi' => 'I',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
