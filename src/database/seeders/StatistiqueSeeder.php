<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatistiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Statistique::insert([
            ['joueur_id' => 1, 'basket_match_id' => 1, 'points' => 28, 'rebonds' => 8, 'passes' => 7],
            ['joueur_id' => 2, 'basket_match_id' => 1, 'points' => 20, 'rebonds' => 10, 'passes' => 3],
            ['joueur_id' => 3, 'basket_match_id' => 1, 'points' => 35, 'rebonds' => 5, 'passes' => 6],
            ['joueur_id' => 5, 'basket_match_id' => 2, 'points' => 30, 'rebonds' => 12, 'passes' => 4],
        ]);
    }
}
