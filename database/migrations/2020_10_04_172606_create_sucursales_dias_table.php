<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSucursalesDiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursales_dias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('dia');
            $table->string('hora_apertura');
            $table->string('hora_cierre');
            $table->unsignedInteger('id_sucursal_dia');
            $table->integer('estado');
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
        Schema::dropIfExists('sucursales_dias');
    }
}
