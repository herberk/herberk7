<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaJuradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_juradas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('arti_id')->nullable();
            $table->enum('estado',['Pendiente por declarar','Declarada en proceso','D.J. Aceptada','D.J. Observada']);
            $table->integer('folio')->nullable();
            $table->double('anot',4)->nullable()->unsigned();
            $table->integer('empresa_id')->unsigned()->index();
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->integer('jurada_id')->unsigned()->index();
            $table->foreign('jurada_id')->references('id')->on('juradas')->onDelete('cascade');
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
        Schema::dropIfExists('empresa_juradas');
    }
}
