<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntraineurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Entraineur::insert([
            ['nom' => 'Vogel', 'equipe_id' => 1],
            ['nom' => 'Donovan', 'equipe_id' => 2],
            ['nom' => 'Stevens', 'equipe_id' => 3],
        ]);
    }
}
