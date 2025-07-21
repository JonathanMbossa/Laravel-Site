<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BasketMatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\BasketMatch::insert([
            [
                'date' => '2024-06-01',
                'equipe_domicile_id' => 1,
                'equipe_exterieure_id' => 2,
                'score_domicile' => 102,
                'score_exterieur' => 98
            ],
            [
                'date' => '2024-06-05',
                'equipe_domicile_id' => 3,
                'equipe_exterieure_id' => 1,
                'score_domicile' => 110,
                'score_exterieur' => 115
            ],
        ]);
    }
}
