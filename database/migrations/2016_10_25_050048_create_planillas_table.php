<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planillas', function (Blueprint $table) {
            $table->increments('id');
            $table->char('codigo', 8);
            $table->integer('proyecto_id')->unsigned();
            $table->integer('colaborador_id')->unsigned();

            $table->foreign('proyecto_id')->references('id')->on('proyectos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::drop('planillas', function (Blueprint $table) {
            $table->dropForeign(['proyecto_id']);
            $table->dropForeign(['colaborador_id']);
        });
    }
}
