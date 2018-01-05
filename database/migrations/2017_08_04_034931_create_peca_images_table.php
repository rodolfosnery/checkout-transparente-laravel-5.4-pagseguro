<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePecaImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peca_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('peca_id')->unsigned();
            $table->foreign('peca_id')->references('id')->on('pecas')->onDelete('cascade');
            $table->string('file_name');
            $table->string('file_size');
            $table->string('dir');
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
        Schema::dropIfExists('peca_images');
    }
}
