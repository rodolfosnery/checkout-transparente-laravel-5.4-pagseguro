<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutoEstampasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_estampas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('produto_id')->unsigned()->index();
            $table->integer('peca_id')->unsigned()->index();
            $table->integer('estampa_id')->unsigned()->index();
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
        Schema::dropIfExists('produto_estampas');
    }
}
