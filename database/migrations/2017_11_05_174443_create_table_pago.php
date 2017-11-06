<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('estado',['pagado','pendiente','atrasado'])->default('pendiente');
            $table->integer('monto');
            $table->date('fecha_pago');
            $table->date('fecha_vencimiento');
            $table->integer('id_beca')->unsigned();

            $table->foreign('id_beca')->references('id')->on('beca')->onDelete('cascade');
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
        Schema::drop('pago');
    }
}
