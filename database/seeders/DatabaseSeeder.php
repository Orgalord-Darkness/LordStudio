<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorieSeeder::class);
        $this->call(SerieSeeder::class);
        $this->call(ImageSeeder::class); 
        $this->call(EpisodeSeeder::class); 
    }
}
