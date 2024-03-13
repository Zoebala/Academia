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
            $table->string("matricule",15);
            $table->string("nom",25);
            $table->string("postnom",25);
            $table->string("prenom",25);
            $table->string("sexe",1);
            $table->string("photo");
            $table->string("province",50)->nullable();
            $table->string("territoire",50)->nullable();
            $table->string("optionSecondaire",50)->nullable();
            $table->date("datenais");
            $table->integer("pourcentage");
            $table->string("nompere",25);
            $table->string("nommere",25);
            $table->string("teletudiant",10);
            $table->string("teltutaire",25);
            $table->string("adresse",50);
            $table->string("nationalite",20)->nullable();           
            $table->boolean("statut")->default(1);
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")
            ->references("id")
            ->on("users");
            $table->timestamps();
            
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiants');
    }
}
