<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoberturaUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cobertura_usuarios', function (Blueprint $table) {
            // 
            $table->increments('id');
            $table->boolean('status');
            // Usuario
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            //
            $table->integer('obra_social_id')->unsigned();
            $table->foreign('obra_social_id')->references('id')->on('obra_socials');

            $table->integer('plan_id')->unsigned();
            $table->foreign('plan_id')->references('id')->on('plans');

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
        Schema::dropIfExists('cobertura_usuarios');
    }
}
