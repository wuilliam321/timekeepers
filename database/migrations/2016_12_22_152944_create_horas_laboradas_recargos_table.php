<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorasLaboradasRecargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horas_laboradas_recargos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_laborada');
            $table->double('horas_laboradas', null, 4);

            $table->string('codigo_recargo');
            $table->foreign('codigo_recargo')->references('codigo')->on('recargos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('horas_laborada_id')->unsigned();
            $table->foreign('horas_laborada_id')->references('id')->on('horas_laboradas')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('colaborador_id')->unsigned();
            $table->foreign('colaborador_id')->references('id')->on('colaboradores')
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
        Schema::drop('horas_laboradas_recargos', function (Blueprint $table) {
            $table->dropPrimary('codigo_primary');
            $table->dropForeign(['horas_laborada_id']);
            $table->dropForeign(['colaborador_id']);
            $table->dropForeign(['planilla_id']);
            $table->dropForeign(['cuenta_costo_id']);
            $table->dropForeign(['beneficio_id']);
            $table->dropForeign(['cuenta_beneficio_id']);
        });
    }
}
