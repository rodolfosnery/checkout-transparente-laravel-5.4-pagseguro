<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('segmento_id')->unsigned();
            $table->foreign('segmento_id')->references('id')->on('segmentos');

            $table->integer('collection_id')->unsigned();
            $table->foreign('collection_id')->references('id')->on('collections');

            $table->tinyInteger('status');
            $table->tinyInteger('outlet');
            $table->tinyInteger('destaque');
            $table->string('titulo');
            $table->string('slug');
            $table->text('descricao');
            $table->string('codigo');
            $table->string('preco');
            $table->string('depor');

            $table->softDeletes();

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
        Schema::dropIfExists('produtos');
    }
}
