<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Image ; 
class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Image::create([ 
            'nom' => 'Poster Overlord', 
            'path' => 'fichiers/poster-overlord-holy-kingdom-affiche-ou-cadre.jpg', 
            'taille' => 219633, // en octets 'extension' => '.jpg', 
            'extension' => '.jpg', 
        ]);
    }
}
