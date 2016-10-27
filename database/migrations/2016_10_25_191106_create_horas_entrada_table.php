<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorasEntradaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horas_entrada', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_entrada');
            $table->dateTime('hora_entrada');
            $table->integer('colaborador_id')->unsigned();
            $table->foreign('colaborador_id')->references('id')->on('colaboradores')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::drop('horas_entrada', function (Blueprint $table) {
            $table->dropForeign(['colaborador_id']);
        });
    }
}
