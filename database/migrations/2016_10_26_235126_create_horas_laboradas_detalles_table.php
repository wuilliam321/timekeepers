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
            $table->date('fecha_laborada');
            $table->float('horas_laboradas');

            $table->integer('horas_laborada_id')->unsigned();
            $table->foreign('horas_laborada_id')->references('id')->on('horas_laboradas')
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
            $table->dropForeign(['horas_laborada_id']);
        });
    }
}
