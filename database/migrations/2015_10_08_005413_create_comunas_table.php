<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComunasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunas', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->integer('regiones_id')->unsigned();
            $table->foreign('regiones_id')->references('id')->on('regiones');
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
        Schema::drop('comunas');
    }

}
