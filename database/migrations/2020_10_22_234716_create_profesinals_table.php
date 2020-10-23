<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesinalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesinals', function (Blueprint $table) {
            $table->id();
            $table->integer('usuario_id');
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('dni');
            $table->string('direccion');
            $table->integer('telefono');
            $table->integer('cod_pos');
            $table->integer('cuit');
            $table->integer('edad');
            $table->date('fecha_nacimiento');
            $table->integer('cobertura_id');
            $table->integer('nro_afiliado');
            $table->integer('tipo_usuario');
            $table->integer('especialidad_id');
            $table->integer('nro_matricula');
            $table->string('email');
            $table->text('observacion');
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
        Schema::dropIfExists('profesinals');
    }
}
