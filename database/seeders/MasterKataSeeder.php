<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterKataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('master_kata')->insert([
            ['kata' => 'LEMARI', 'clue' => 'Tempat menyimpan pakaian'],
            ['kata' => 'BAJU', 'clue' => 'Dipakai di badan'],
            ['kata' => 'CELANA', 'clue' => 'Pakaian untuk bagian bawah'],
            ['kata' => 'KASUR', 'clue' => 'Tempat tidur'],
            ['kata' => 'LAPTOP', 'clue' => 'Alat kerja kantoran masa kini'],
        ]);        
    }
}
