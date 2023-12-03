<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategoris')->insert([
            'nama' => 'Fiksi',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kategoris')->insert([
            'nama' => 'Nonfiksi',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
