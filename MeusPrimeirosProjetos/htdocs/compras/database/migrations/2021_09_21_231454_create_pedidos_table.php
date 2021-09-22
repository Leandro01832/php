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
            $table->date("data");
            $table->enum("status", ['c', 'a', 'p']);
            $table->integer("usuario_id")->unsigned();
            $table->integer("cupom_id")->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('cupom_id')->references('id')->on('cupons');
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
