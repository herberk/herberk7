<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadvaloresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidadvalores', function (Blueprint $table) {
            $table->id();
            $table->integer('anomes')->nullable()->unsigned();
            $table->integer('ano')->nullable()->unsigned();
            $table->integer('meses_id')->unsigned();
            $table->double('utm',10)->nullable()->unsigned();
            $table->double('utma',10)->nullable()->unsigned();
            $table->double('ipc',4.2)->nullable();
            $table->double('ipca',4.2)->nullable()->unsigned();
//            $table->foreign('meses_id')->references('id')->on('meses');
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
        Schema::dropIfExists('unidadvalores');
    }
}
