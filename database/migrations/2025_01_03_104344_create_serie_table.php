<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSerieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serie', function (Blueprint $table) {
            $table->id('id_serie');
            $table->string('nom'); 
            $table->string('synopsis');
            $table->uuid('id_categorie')->index();
            $table->foreign('id_categorie')->references('id')->on('categories')->onDelete('cascade'); // Clé étrangère
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
        Schema::dropIfExists('serie');
    }
}
