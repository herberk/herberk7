<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecuentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recuentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('ventaRCV',14,0)->nullable();
            $table->double('otroing',14,0)->nullable();
            $table->double('compraRCV',14,0)->nullable();
            $table->double('remuneraciones',14,0)->nullable();
            $table->double('honorarios',14,0)->nullable();
            $table->double('arriendos',14,0)->nullable();
            $table->double('otrogas',14,0)->nullable();
            $table->double('saldo',14,0)->nullable();
            $table->double('utmes',6.2)->nullable()->unsigned();
            $table->double('into9',14,0)->nullable();
            $table->integer('ano')->nullable()->unsigned();
            $table->integer('meses_id')->unsigned();
            $table->integer('empresas_id')->unsigned();
            $table->foreign('empresas_id')->references('id')->on('empresas');
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
        Schema::dropIfExists('recuentos');
    }
}
