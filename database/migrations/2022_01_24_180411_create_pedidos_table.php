<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status_pedido', 30);
            $table->integer('id_mesa')->unsigned();
            $table->integer('id_prato')->unsigned();
            $table->foreign('id_mesa')->references('id')->on('mesas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_prato')->references('id')->on('pratos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('pedidos');
    }
}
