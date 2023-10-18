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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('password');
            $table->string('alamat');
            $table->string('noTelp');
            $table->rememberToken();
            $table->timestamps();
        });

         // Hash the password before storing it
        $hashedPassword = Hash::make('user123');

         // Insert a new user
        DB::table('users')->insert([
            'nama' => 'user',
            'password' => $hashedPassword,
            'alamat' => 'parung dengdek',
            'noTelp' => '0821',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
