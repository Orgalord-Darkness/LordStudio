<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episode', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre'); 
            $table->integer('id_serie')->index();
            $table->foreign('id_serie')->references('id')->on('serie')->onDelete('cascade'); // Clé étrangère
            $table->integer('saison'); 
            $table->string('type'); 
            $table->string('path')->default('chemin/par/défaut'); 
            $table->float('taille')->default(0.0); 
            $table->string('extension')->default('.defaut'); 
            $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('episode');
    }
}
