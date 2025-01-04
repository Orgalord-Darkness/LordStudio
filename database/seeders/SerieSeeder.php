<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Categorie ; 
use Carbon\Carbon;

class SerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorieIds = Categorie::pluck('id')->toArray();
        DB::table('serie')->insert([
            [
                'nom' => 'X-Files',
                'synopsis' => 'Les enquêtes des agents du FBI Fox Mulder et Dana Scully sur les phénomènes paranormaux.',
                'id_categorie' => $categorieIds[array_rand($categorieIds)],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nom' => 'Le Caméléon',
                'synopsis' => 'Un génie capable de se faire passer pour n\'importe qui recherche ses origines.',
                'id_categorie' => $categorieIds[array_rand($categorieIds)],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nom' => 'Doctor Who',
                'synopsis' => 'Les aventures d\'un Seigneur du Temps, voyageant à travers le temps et l\'espace.',
                'id_categorie' => $categorieIds[array_rand($categorieIds)],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nom' => 'Overlord',
                'synopsis' => 'Un joueur reste coincé dans un jeu vidéo de réalité virtuelle à la fermeture de celui-ci.',
                'id_categorie' => $categorieIds[array_rand($categorieIds)],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nom' => 'Fruits Basket 2019',
                'synopsis' => 'Une jeune fille découvre que certains membres de la famille Sohma se transforment en animaux du zodiaque chinois.',
                'id_categorie' => $categorieIds[array_rand($categorieIds)],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
