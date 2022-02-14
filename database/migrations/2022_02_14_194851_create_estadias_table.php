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
            $table->increments('id');
            $table->time('horario_chegada');
            $table->time('horario_saida')->nullable();
            $table->date('data_atual');
            $table->decimal('valor_total_estadia')->nullable();
            $table->integer('status_estadia')->default('1');
            $table->integer('id_pedido')->unsigned()->nullable();
            $table->foreign('id_pedido')->references('id')->on('pedidos')->onDelete('cascade');
            $table->integer('id_mesa')->unsigned();
            $table->foreign('id_mesa')->references('id')->on('mesas')->onDelete('cascade');
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
        Schema::dropIfExists('estadias');
    }
}
