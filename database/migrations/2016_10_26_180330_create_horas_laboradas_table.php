<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorasLaboradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horas_laboradas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('colaborador_id')->unsigned();
            $table->foreign('colaborador_id')->references('id')->on('colaboradores')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('proyecto_id')->unsigned();
            $table->foreign('proyecto_id')->references('id')->on('proyectos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('planilla_id')->unsigned();
            $table->foreign('planilla_id')->references('id')->on('planillas')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('cuenta_costo_id')->unsigned();
            $table->foreign('cuenta_costo_id')->references('id')->on('cuentas_costos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('beneficio_id')->unsigned();
            $table->foreign('beneficio_id')->references('id')->on('beneficios')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('cuenta_beneficio_id')->unsigned();
            $table->foreign('cuenta_beneficio_id')->references('id')->on('cuentas_beneficios')
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
        Schema::drop('horas_laboradas', function (Blueprint $table) {
            $table->dropForeign(['colaborador_id']);
            $table->dropForeign(['proyecto_id']);
            $table->dropForeign(['planilla_id']);
            $table->dropForeign(['cuenta_costo_id']);
            $table->dropForeign(['beneficio_id']);
            $table->dropForeign(['cuenta_beneficio_id']);
        });
    }
}
