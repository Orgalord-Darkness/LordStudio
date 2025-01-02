<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorie')->insert([
            [
                'id' => Str::uuid(), // Ajustez en fonction de votre structure de base de données
                'nom_categorie' => 'Science-Fiction',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(), // Ajustez en fonction de votre structure de base de données
                'nom_categorie' => 'Fantaisie',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(), // Ajustez en fonction de votre structure de base de données
                'nom_categorie' => 'Drame',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(), // Ajustez en fonction de votre structure de base de données
                'nom_categorie' => 'Comédie',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(), // Ajustez en fonction de votre structure de base de données
                'nom_categorie' => 'Mystère',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(), // Ajustez en fonction de votre structure de base de données
                'nom_categorie' => 'Action',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(), // Ajustez en fonction de votre structure de base de données
                'nom_categorie' => 'Aventure',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(), // Ajustez en fonction de votre structure de base de données
                'nom_categorie' => 'Horreur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(), // Ajustez en fonction de votre structure de base de données
                'nom_categorie' => 'Romance',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        
        
        
        
    }
}
