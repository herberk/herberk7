<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('rut',12)->nullable();
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->string('nickname')->unique()->nullable();
            $table->string('cargo')->nullable();
            $table->string('avatar')->default('user.jpg');
            $table->timestamp('fenacio')->nullable();
            $table->string('direccion')->nullable();
            $table->integer('region_id')->unsigned()->nullable();
            $table->string('region')->nullable();
            $table->integer('comuna_id')->unsigned()->nullable();
            $table->string('comuna')->nullable();
            $table->integer('ciudad_id')->unsigned()->nullable();
            $table->string('ciudad')->nullable();
            $table->string('codpostal')->nullable();
            $table->enum('sexo', ['Masculino', 'Femenino']);
            $table->string('nacionalidad')->nullable();
            $table->enum('edocivil', ['Soltero/a','Casado/a','Viudo/a','Divorciado/a','Separadoo/a']);
            $table->boolean('enabled')->default(1);
            $table->string('url')->nullable();
            $table->unsignedInteger('profession_id')->nullable();
            $table->foreign('profession_id')->references('id')  ->on('professions');
            $table->integer('empresas_id')->unsigned();
            $table->foreign('empresas_id')->references('id')->on('empresas');
            $table->text('notas')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('etiqueta')->nullable();
            $table->integer('personas_id')->unsigned();
//            $table->foreign('personas_id')->references('id')->on('personas');
            $table->timestamps();
        });
        Schema::create('fonos', function (Blueprint $table) {
            $table->id();
            $table->string('fono')->nullable();
            $table->string('etiqueta')->nullable();
            $table->integer('personas_id')->unsigned();
//           $table->foreign('personas_id')->references('id')->on('personas');
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
        Schema::dropIfExists('personas');
        Schema::dropIfExists('emails');
        Schema::dropIfExists('fonos');
    }
}
