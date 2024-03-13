<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFraisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frais', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            
            $table->integer("montanFrais");
            $table->string("motif",30);
            
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

            $table->unsignedBigInteger("promotion_id");
            $table->foreign("promotion_id")
            ->references("id")
            ->on("promotions")
            ->onDelete("cascade"); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frais');
    }
}
