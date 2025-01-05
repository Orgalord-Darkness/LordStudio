<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image', function (Blueprint $table) {
            $table->increments('id_image');
            $table->string('nom')->default('nom par défaut') ; 
            $table->string('path')->default('default/path'); //default sert à mettre une valeur par défaut alors que ->change() sert à rendre le champ facultatif
            $table->integer('taille')->default(0);
            $table->string('extension')->default('.jpg');
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
        Schema::dropIfExists('image');
    }
}
