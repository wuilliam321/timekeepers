<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recargos', function (Blueprint $table) {
            $table->string('codigo');
            $table->string('nombre');
            $table->double('recargo', null, 2);
            $table->timestamps();
            $table->primary('codigo', 'codigo_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('recargos', function(Blueprint $table) {
            $table->dropPrimary('codigo_primary');
        });
    }
}
