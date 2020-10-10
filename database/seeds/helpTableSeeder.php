<?php


use Illuminate\Database\Seeder;

class helpTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('helps')->insert(array(
            array('id' => '1','pantalla' => 'pantallla','default-notes' => 'Esta es la ayuda numero uno','notes' => 'Para importar un archivo con los datos de la tabla de Índices económicos, hay que hacer un archivo excel con cinco columnas
1.- año 2.- mes 3.- utm 4.- ipc 5.-ipca
Este archivo tiene encabezados que corresponde a los cinco anteriores.
El año se repite en la doce filas idem.
El mes debe contener un numero correspondiente al mes, esto es 1 = enero. No 01 o 02','created_at' => NULL,'updated_at' => NULL)


        ));
    }
}
