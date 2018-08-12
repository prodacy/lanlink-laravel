<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DepartamentoFuncionarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamento_funcionario', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('departamento_id')->unsigned();
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');
            $table->integer('funcionario_id')->unsigned();
            $table->foreign('funcionario_id')->references('id')->on('funcionarios')->onDelete('cascade');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('departamento_funcionario');
    }
}