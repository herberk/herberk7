<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJuradasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juradas', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('nro_dj');
            $table->integer('arti_id')->unsigned();
            $table->string('desc_corta',30)->nullable()->unique();
            $table->date('fe_vence');
            $table->text('descripcion')->nullable();
            $table->string('certificado')->nullable();
            $table->date('fe_certifica')->nullable();
            $table->string('Instruccion',500 )->nullable();     //ruta a un archivo pdf
            $table->string('Formulario',500)->nullable();     //ruta a un archivo pdf
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
        Schema::drop('juradas');
    }

}
