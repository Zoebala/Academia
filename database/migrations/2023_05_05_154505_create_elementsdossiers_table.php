<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementsdossiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elementsdossiers', function (Blueprint $table) {
            $table->id();
            $table->string("demandeInscript")->nullable();
            $table->string("diplomeEtat")->nullable();
            $table->string("bulletin5e")->nullable();
            $table->string("bulletin6e")->nullable();
            $table->string("carteIdentite")->nullable();
            $table->string("attestationNais")->nullable();
            $table->string("attestationBCVM")->nullable();
            $table->string("attestationNation")->nullable();
            $table->string("attestationStatut")->nullable();
            $table->string("profil1")->nullable();
            $table->string("profil2")->nullable();
            $table->string("profil3")->nullable();

            $table->unsignedBigInteger("etudiant_id");
            $table->foreign("etudiant_id")
            ->references("id")
            ->on("etudiants")
            ->onDelete("cascade");

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
        Schema::dropIfExists('elementsdossiers');
    }
}
