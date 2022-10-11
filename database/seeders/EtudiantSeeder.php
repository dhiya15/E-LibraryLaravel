<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EtudiantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('etudiants')->insert([
            'code' => "38004256",
            'image' => null,
            'nom' => "ABID",
            'prénom' => "Dhiya Eddine",
            'email' => "abidmohamed93@gmail.com",
            'mot_de_passe' => Hash::make('38004256'),
            'date_de_naissance' => "1998-10-15",
            'lieu_de_naissance' => "kerzaz",
            'adress' => "kerzaz",
            'niveau' => "Première année",
            'matière' => "Française",
            'phase' => "Lycee",
            'type' => "Etudiant",
        ]);
    }
}
