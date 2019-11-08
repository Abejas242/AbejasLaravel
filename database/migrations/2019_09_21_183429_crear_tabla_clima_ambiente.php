<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaClimaAmbiente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clima_ambiente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('temperatura');
            $table->integer('humedad');
            $table->date('fecha');
            $table->string('hora');
            $table->unsignedInteger('apiario_id');
           // $table->foreign('apiario_id')->references('id')->on('apiario');
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
        Schema::dropIfExists('clima_ambiente');
    }
}
