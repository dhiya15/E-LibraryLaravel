<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('image')->nullable();
            $table->string('nom')->nullable();
            $table->string('prénom')->nullable();
            $table->string('email')->nullable();
            $table->string('mot_de_passe')->nullable();
            $table->string('telephone')->nullable();
            $table->date('date_de_naissance')->nullable();
            $table->string('lieu_de_naissance')->nullable();
            $table->string('adress')->nullable();
            $table->enum('niveau', ['Première année', 'Deuxième année', 'Troisième année', 'Quatrième année', 'Cinquième année'])->nullable();
            $table->enum('matière', ['Physique', 'Arabe', 'Math', 'Informatique', "Française"])->nullable(); // physique, math....
            $table->enum('phase', ['Lycee', 'Moyenne', 'Primaire'])->nullable(); // lycee, moyenne , primaire
            $table->enum('type', ['Agent', 'Admin', 'Etudiant'])->nullable();;
            $table->softDeletes();
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
        Schema::dropIfExists('students');
    }
}
