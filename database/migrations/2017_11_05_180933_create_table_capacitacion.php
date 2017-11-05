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
            $table->string('nombre');
            $table->integer('cupos');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('duracion');
            $table->integer('id_hora_dia')->unsigned();

            $table->foreign('id_hora_dia')->references('id')->on('dia_hora');

            $table->timestamps();
        });

        Schema::create('empleado_beca_institucion_capacitacion', function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_empleado')->unsigned();
            $table->integer('id_beca')->unsigned();
            $table->integer('id_institucion')->unsigned();
            $table->integer('id_capacitacion')->unsigned();

            $table->foreign('id_empleado')->references('id')->on('empleado');
            $table->foreign('id_beca')->references('id')->on('beca');
            $table->foreign('id_institucion')->references('id')->on('institucion');
            $table->foreign('id_capacitacion')->references('id')->on('capacitacion');

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
