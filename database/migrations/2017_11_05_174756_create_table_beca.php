<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBeca extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beca', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tipo_beca')->unsigned();
            $table->integer('id_pago')->unsigned();
            $table->integer('porcentaje');

            $table->foreign('id_tipo_beca')->references('id')->on('tipoBeca');
            $table->foreign('id_pago')->references('id')->on('pago')->onDelete('cascade');

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
        Schema::drop('beca');
    }
}
