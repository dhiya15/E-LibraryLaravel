<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LivreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('livres')->insert([
            'cotation' => "418/048",
            'titres' => "Les linguistiqufes de corpus",
            'auteur' => "Benot - Habert",
            'inventaire' => "621+622",
            'nombre_ex' => 2,
            'spécialiste' => "Française",
            'matière' => "Française",
            'date_edition' => "2005",
            'editeur' => "Presses universitaires de Rennes",
            'date_entrée' => "15-10-1998",
            'isbn' => "2-7535-0046-0",
            'image' => null,
        ]);
    }
}
