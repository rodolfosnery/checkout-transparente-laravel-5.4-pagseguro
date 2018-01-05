<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('sobrenome');
            $table->string('email')->unique();
            $table->string('nascimento', 15);
            $table->string('sexo', 10);
            $table->string('telefone', 16);
            $table->string('celular', 16);
            $table->string('cpf', 14);
            $table->string('cep', 9);
            $table->string('rua', 100);
            $table->tinyInteger('numero');
            $table->string('bairro', 50);
            $table->string('complemento', 100);
            $table->string('uf', 2);
            $table->string('cidade', 50);
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
