<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->date("dateInscription");

            $table->unsignedBigInteger("annee_id");
            $table->foreign("annee_id")
            ->references("id")
            ->on("anneeacads")
            ->onDelete("cascade");

            $table->unsignedBigInteger("etudiant_id");
            $table->foreign("etudiant_id")
            ->references("id")
            ->on("etudiants")
            ->onDelete("cascade");

            $table->unsignedBigInteger("option_id");
            $table->foreign("option_id")
            ->references("id")
            ->on("options")
            ->onDelele("cascade");
            
            $table->unsignedBigInteger("promotion_id");
            $table->foreign("promotion_id")
            ->references("id")
            ->on("promotions")
            ->onDelele("cascade");

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
        Schema::dropIfExists('inscriptions');
    }
}
