<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValCapitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valcapitals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('ano',4)->nullable()->unsigned();
            $table->double('capitaltri',14,0)->nullable();
            $table->float('pranual',3,2)->nullable();
            $table->double('revaloriza',14,2)->nullable();
            $table->double('resultado',14,0)->nullable();
            $table->double('impto',14,0)->nullable();
            $table->double('primpto',3,2)->nullable();
            $table->double('revalimpto',14,0)->nullable();
            $table->double('retiro',14,0)->nullable();
            $table->double('capitalsgte',14,0)->nullable();
            $table->integer('capitals_id')->unsigned();
 //          $table->foreign('capitals_id')->references('id')->on('capitals');
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
        Schema::dropIfExists('valcapitals');
    }
}
