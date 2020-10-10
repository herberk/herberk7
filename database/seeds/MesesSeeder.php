<?php

use Illuminate\Database\Seeder;

class MesesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('meses')->insert(array(
            array('id' => '1','mes' => 'Enero'),
            array('id' => '2','mes' => 'Febrero'),
            array('id' => '3','mes' => 'Marzo'),
            array('id' => '4','mes' => 'Abril'),
            array('id' => '5','mes' => 'Mayo'),
            array('id' => '6','mes' => 'Junio'),
            array('id' => '7','mes' => 'Julio'),
            array('id' => '8','mes' => 'Agosto'),
            array('id' => '9','mes' => 'Septiembre'),
            array('id' => '10','mes' => 'Octubre'),
            array('id' => '11','mes' => 'Noviembre'),
            array('id' => '12','mes' => 'Diciembre')
        ));
    }
}
