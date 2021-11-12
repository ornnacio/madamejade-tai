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
            $table->id();
			$table->string('cliente');
			$table->string('descrição');
			$table->decimal('total');
			$table->integer('id_produto')->unsigned();
            $table->timestamps();
        });
		
		Schema::table('pedidos', function (Blueprint $table) {
			$table->foreign('id_produto')->references('id')->on('produtos')->onDelete('cascade');;
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
