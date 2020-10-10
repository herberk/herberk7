<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categorias')->insert(array(
            array('id' => '1','name' => 'Documento comercial','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '2','name' => 'Moneda','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '3','name' => 'Operacion comercial','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '4','name' => 'Documento Meracantil','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '5','name' => 'Motivos de Castigos','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '6','name' => 'Tipo de Soc. Empresas','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '7','name' => 'Regimen de Tributacion','created_at' => '2017-08-22 20:10:39','updated_at' => '2020-08-31 13:06:41'),
            array('id' => '8','name' => 'Instituciones Bancarias','created_at' => '2018-05-15 15:44:05','updated_at' => '2018-05-15 15:44:05'),
            array('id' => '9','name' => 'Declaraciones Juradas','created_at' => '2019-01-09 15:58:08','updated_at' => '2019-01-09 15:58:08'),
            array('id' => '10','name' => 'Estados Declaraciones Juradas','created_at' => '2019-03-07 12:08:14','updated_at' => '2019-03-07 12:08:14'),
            array('id' => '11','name' => 'Segmendos empresas SII','created_at' => '2020-08-31 13:13:48','updated_at' => '2020-08-31 13:13:48')

        ));
    }
}
