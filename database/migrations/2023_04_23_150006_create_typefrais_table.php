<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypefraisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typefrais', function (Blueprint $table) {
            $table->id();
            $table->String("Motif",50);
            $table->integer("Montanttypefrais");
            $table->unsignedBigInteger("promotion_id")->nullable();
            $table->unsignedBigInteger("annee_id");
            $table->foreign("annee_id")
            ->references("id")
            ->on("anneeacads")
            ->onDelete("cascade");
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
        Schema::dropIfExists('typefrais');
    }
}
