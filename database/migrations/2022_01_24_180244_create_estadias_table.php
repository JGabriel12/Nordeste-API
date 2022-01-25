<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadias', function (Blueprint $table) {
            $table->id();
            $table->time('horario_chegada');
            $table->time('horario_saida');
            $table->date('data_atual');
            $table->decimal('valor_total_estadia');
            $table->string('status_mesa', 20);
            /* $table->foreignId('mesa_id')->constrained('mesas'); */
            /* $table->id('mesa_id'); */
            $table->foreign('mesa_id')->references('id')->on('mesas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estadias');
    }
}
