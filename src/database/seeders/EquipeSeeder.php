<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Equipe::insert([
            ['nom' => 'Lakers', 'ville' => 'Los Angeles'],
            ['nom' => 'Bulls', 'ville' => 'Chicago'],
            ['nom' => 'Celtics', 'ville' => 'Boston'],
        ]);
    }
}
