<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMailSucursals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         //
        Schema::table('sucursals', function (Blueprint $table) {
            $table->string('latitud')->after('estado');
            $table->string('longitud')->after('estado');
            $table->string('email')->after('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sucursals', function (Blueprint $table) {
            $table->dropColumn('latitud');
            $table->dropColumn('longitud');
            $table->dropColumn('email');
        });
    }
}
