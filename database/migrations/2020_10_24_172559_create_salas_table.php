<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salas', function (Blueprint $table) {
            $table->id();

            $table->integer('sucursal_id');
            $table->integer('sala_id');
            $table->integer('profesional_id');
            $table->integer('especialidad_id');
            $table->integer('dia');
            $table->time('hora_hasta',0);
            $table->time('hora_desde',0);
            $table->text('observacion');
            $table->tinyInteger('estado');

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
        Schema::dropIfExists('salas');
    }
}
