<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capitals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('activo',14,0)->nullable();
            $table->double('into21',14,0)->nullable();
            $table->double('into1',14,0)->nullable();
            $table->double('into2',14,0)->nullable();
            $table->double('into3',14,0)->nullable();
            $table->double('into4',14,0)->nullable();
            $table->double('into5',14,0)->nullable();
            $table->double('into6',14,0)->nullable();
            $table->double('into7',14,0)->nullable();
            $table->double('into8',14,0)->nullable();
            $table->double('into9',14,0)->nullable();
            $table->double('into22',14,0)->nullable();
            $table->double('complementa1',14,0)->nullable();
            $table->double('complementa2',14,0)->nullable();
            $table->double('complementa3',14,0)->nullable();
            $table->double('valfinanciero31',14,0)->nullable();
            $table->double('valfinanciero1',14,0)->nullable();
            $table->double('valfinanciero2',14,0)->nullable();
            $table->double('valfinanciero3',14,0)->nullable();
            $table->double('valfinanciero4',14,0)->nullable();
            $table->double('valfinanciero5',14,0)->nullable();
            $table->double('valfinanciero6',14,0)->nullable();
            $table->double('valfinanciero7',14,0)->nullable();
            $table->double('valfinanciero8',14,0)->nullable();
            $table->double('valfinanciero9',14,0)->nullable();
            $table->double('valtributario32',14,0)->nullable();
            $table->double('valtributario1',14,0)->nullable();
            $table->double('valtributario2',14,0)->nullable();
            $table->double('valtributario3',14,0)->nullable();
            $table->double('valtributario4',14,0)->nullable();
            $table->double('valtributario5',14,0)->nullable();
            $table->double('valtributario6',14,0)->nullable();
            $table->double('valtributario7',14,0)->nullable();
            $table->double('valtributario8',14,0)->nullable();
            $table->double('pasivo51',14,0)->nullable();
            $table->double('pasivoexigi1',14,0)->nullable();
            $table->double('pasivoexigi2',14,0)->nullable();
            $table->double('pasivoexigi3',14,0)->nullable();
            $table->double('pasivoexigi4',14,0)->nullable();
            $table->double('pasivoexigi5',14,0)->nullable();
            $table->double('pasivoexigi6',14,0)->nullable();
            $table->double('pasivoexigi7',14,0)->nullable();
            $table->double('pasivoexigi8',14,0)->nullable();
            $table->double('pasivoexigi9',14,0)->nullable();
            $table->double('pasivoexigi10',14,0)->nullable();
            $table->double('pasivoexigi11',14,0)->nullable();
            $table->double('pasivoexigi12',14,0)->nullable();
            $table->double('pasivoexigi13',14,0)->nullable();
            $table->double('capitaltri',14,0)->nullable();
            $table->double('ano',4)->nullable()->unsigned();
            $table->integer('empresas_id')->unsigned();
            $table->foreign('empresas_id')->references('id')->on('empresas');
            $table->text('notas')->nullable();
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
        Schema::dropIfExists('capitals');
    }
}
