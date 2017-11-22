<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCapacitacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capacitacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_capacitacion');
            $table->integer('cupos');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('duracion');
    

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
        Schema::drop('capacitacion');
    }
}
