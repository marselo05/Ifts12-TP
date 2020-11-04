<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turnos', function (Blueprint $table) {
            $table->id();
            $table->integer('tipo_de_orden_id')->nullable();
            $table->integer('paciente_id');
            $table->string('paciente_nombre_apellido');
            $table->string('paciente_dni');
            $table->integer('profesional_id');
            $table->string('profesional_nombre_apellido');
            $table->integer('especialidad_id');
            $table->string('especialidad_nombre');
            $table->integer('sucursal_id');
            $table->string('sucursal_nombre');
            $table->string('sala_id');
            $table->string('fecha');
            $table->integer('dia');
            $table->string('hora_inicio');
            $table->string('hora_fin');
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
        Schema::dropIfExists('turnos');
    }
}
