<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Episode;  
class EpisodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seeder de Episode
        Episode::create([
            'titre' => 'Berserk 1997 épisode 1', 
            'id_serie' => 6, 
            'saison' => 1, 
            'type' => 'episode', 
            'path' => 'videos/episode/Berserk_Episode1_(VF).mp4',
            'taille' => 53.6, 
            'extension' => '.mp4', 
        ]); 
    }
}
