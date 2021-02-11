<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->string('nome',300);
            $table->string('cpf',20);
            $table->string('telefone',50);
            $table->dateTime('nasc');
            $table->string('sus',50);
            $table->string('cep',50);
            $table->string('logradouro',300);
            $table->string('complemento',300)->nullable();
            $table->string('bairro',300);
            $table->string('localidade',300);
            $table->string('uf',2);
            $table->string('numero',200);
            $table->integer('status')->nullable();
            


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
        Schema::dropIfExists('clientes');
    }
}
