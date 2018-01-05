<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutoTamanhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_tamanhos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('produto_id')->unsigned()->index();
            $table->integer('peca_id')->unsigned()->index();
            $table->integer('tamanho_id')->unsigned()->index();
            $table->integer('quantidade');
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
        Schema::dropIfExists('produto_tamanhos');
    }
}
