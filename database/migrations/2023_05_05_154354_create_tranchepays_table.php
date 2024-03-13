<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranchepaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tranchepays', function (Blueprint $table) {
            $table->id();
            $table->string("libTranche","20");
            $table->integer("montantTranche");
            $table->date("dateTranche");
            $table->string("refTranche");

            $table->unsignedBigInteger("frais_id");
            $table->foreign("frais_id")
            ->references("id")
            ->on("frais")
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
        Schema::dropIfExists('tranchepays');
    }
}
