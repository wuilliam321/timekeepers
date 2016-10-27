<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorasLaboradasDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horas_laboradas_detalles', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('fecha_laborada');
            $table->smallInteger('horas_laboradas')->unsigner();

            $table->integer('horas_laboradas_id')->unsigned();
            $table->foreign('horas_laboradas_id')->references('id')->on('horas_laboradas')
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
        Schema::drop('horas_laboradas_detalles', function (Blueprint $table) {
            $table->dropForeign(['horas_laboradas_id']);
        });
    }
}
