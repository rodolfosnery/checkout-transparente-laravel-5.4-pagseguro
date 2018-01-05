<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstampaImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estampa_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estampa_id')->unsigned();
            $table->foreign('estampa_id')->references('id')->on('estampas')->onDelete('cascade');
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
        Schema::dropIfExists('estampa_images');
    }
}
