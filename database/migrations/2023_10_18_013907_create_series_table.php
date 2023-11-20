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
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_buku')->nullable();
            $table->string('chapter');
            $table->string('isi');
            $table->enum('status', ['I', 'T', 'P']);
            $table->timestamps();
        });

         // Insert a new series
        DB::table('series')->insert([
            'id_buku' => '1',
            'chapter' => 'BAB 1',
            'isi' => 'pada jaman dahulu',
            'status' => 'I',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('series');
    }
};
