<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGirosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('girosas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('girosbs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('blanco');
            $table->integer('girosas_id')->unsigned();
            $table->foreign('girosas_id')->references('id')->on('girosas');
            $table->timestamps();
        });

        Schema::create('giros', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('codigo');
            $table->string('name');
            $table->string('afecto');
            $table->string('cat_tribut');
            $table->integer('girosbs_id')->unsigned();
            $table->foreign('girosbs_id')->references('id')->on('girosbs');
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
        Schema::drop('girosas');
        Schema::drop('girosbs');
        Schema::drop('giros');

    }

}
