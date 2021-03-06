<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaApiario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apiario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',25);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('ubicacion_id');
            //$table->foreign('ubicacion_id')->references('id')->on('ubicacion');
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
        Schema::dropIfExists('apiario');
    }
}