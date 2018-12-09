<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeroiEspecialidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heroi_especialidades', function (Blueprint $table) {
            $table->integer('heroi_id')->unsigned();
            $table->foreign('heroi_id')->references('id')->on('herois');
            $table->integer('especialidade_id')->unsigned();
            $table->foreign('especialidade_id')->references('id')->on('especialidades');
            $table->primary(['heroi_id', 'especialidade_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('heroi_especialidades');
    }
}
