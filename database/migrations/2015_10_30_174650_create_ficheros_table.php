<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFicherosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficheros', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->integer('size');
            $table->string('extension');
            $table->string('public_url');
            $table->string('directorio');
            $table->integer('directorio_id')->unsigned();
            $table->foreign('directorio_id')->references('id')->on('directorios');
            $table->string('empresa');
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
        Schema::drop('ficheros');
    }

}
