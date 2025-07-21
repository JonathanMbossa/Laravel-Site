<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JoueurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Joueur::insert([
            ['nom' => 'James', 'prenom' => 'LeBron', 'poste' => 'Ailier', 'numero' => 6, 'equipe_id' => 1],
            ['nom' => 'Davis', 'prenom' => 'Anthony', 'poste' => 'Pivot', 'numero' => 3, 'equipe_id' => 1],
            ['nom' => 'Jordan', 'prenom' => 'Michael', 'poste' => 'Arrière', 'numero' => 23, 'equipe_id' => 2],
            ['nom' => 'Pippen', 'prenom' => 'Scottie', 'poste' => 'Ailier', 'numero' => 33, 'equipe_id' => 2],
            ['nom' => 'Bird', 'prenom' => 'Larry', 'poste' => 'Ailier fort', 'numero' => 33, 'equipe_id' => 3],
            ['nom' => 'Parish', 'prenom' => 'Robert', 'poste' => 'Pivot', 'numero' => 00, 'equipe_id' => 3],
        ]);
    }
}
