<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHora extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hora', function (Blueprint $table) {
            $table->increments('id');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->timestamps();
        });

        Schema::create('dia_hora', function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_dia')->unsigned();
            $table->integer('id_hora')->unsigned();

            $table->foreign('id_dia')->references('id')->on('dia');
            $table->foreign('id_hora')->references('id')->on('hora');
            
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
        Schema::drop('hora');
    }
}
