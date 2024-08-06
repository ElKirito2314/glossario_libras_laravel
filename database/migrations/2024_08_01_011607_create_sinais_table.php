<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinais', function (Blueprint $table) {
            //Coluna
            $table->id();
            $table->unsignedBigInteger('termo_id');
            $table->string('midia', 255);
            $table->text('descricao');
            $table->string('fonte', 75)->nullable();
            $table->timestamps();

            //Constraint
            $table->foreign('termo_id')->references('id')->on('termos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sinais');
    }
}
