<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livres', function (Blueprint $table) {
            $table->id();
            $table->string("cotation")->nullable();
            $table->string("titres")->nullable();
            $table->string("auteur")->nullable();
            $table->string("inventaire")->nullable();
            $table->integer("nombre_ex")->nullable();
            $table->string("spécialiste")->nullable();
            $table->enum('matière', ['Physique', 'Arabe', 'Math', 'Informatique', "Française"])->nullable(); // physique, math....
            $table->string("date_edition")->nullable();
            $table->string("editeur")->nullable();
            $table->string("date_entrée")->nullable();
            $table->string("isbn")->nullable();
            $table->string("image")->nullable();
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
        Schema::dropIfExists('livres');
    }
}
