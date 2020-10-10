<?php

use Illuminate\Database\Seeder;

class TiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('tipos')->insert(array(
            array( // row #0
                'id' => 1,
                'name' => 'Documento comercial',
                'created_at' => '2017-08-22 20:10:39',
                'updated_at' => '2017-08-22 20:10:39',
            ),
            array( // row #1
                'id' => 2,
                'name' => 'Moneda',
                'created_at' => '2017-08-22 20:10:39',
                'updated_at' => '2017-08-22 20:10:39',
            ),
            array( // row #2
                'id' => 3,
                'name' => 'Operacion comercial',
                'created_at' => '2017-08-22 20:10:39',
                'updated_at' => '2017-08-22 20:10:39',
            ),
            array( // row #3
                'id' => 4,
                'name' => 'Documento Meracantil',
                'created_at' => '2017-08-22 20:10:39',
                'updated_at' => '2017-08-22 20:10:39',
            ),
            array( // row #4
                'id' => 5,
                'name' => 'Motivos de Castigos',
                'created_at' => '2017-08-22 20:10:39',
                'updated_at' => '2017-08-22 20:10:39',
            ),
            array( // row #5
                'id' => 6,
                'name' => 'Tipo de Soc. Empresas',
                'created_at' => '2017-08-22 20:10:39',
                'updated_at' => '2017-08-22 20:10:39',
            ),
            array( // row #6
                'id' => 7,
                'name' => 'Sitema de Tributacion',
                'created_at' => '2017-08-22 20:10:39',
                'updated_at' => '2017-08-22 20:10:39',
            ),
            array( // row #7
                'id' => 8,
                'name' => 'Instituciones Bancarias',
                'created_at' => '2018-05-15 15:44:05',
                'updated_at' => '2018-05-15 15:44:05',
            ),
            array( // row #8
                'id' => 9,
                'name' => 'Declaraciones Juradas',
                'created_at' => '2019-01-09 15:58:08',
                'updated_at' => '2019-01-09 15:58:08',
            ),
            array( // row #9
                'id' => 10,
                'name' => 'Estados Declaraciones Juradas',
                'created_at' => '2019-03-07 12:08:14',
                'updated_at' => '2019-03-07 12:08:14',
            ),
        ));
    }
}
