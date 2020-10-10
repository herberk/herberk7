<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::connection('dbsql')->table('Settings')->insert(array(
            array( // row #0
                'id' => 1,
                'name' => 'company',
                'val' => 'Seleccione empresa',
                'type' => 'string',
                'empresas_id' => 0,
                'created_at' => '2019-07-21 11:33:51',
                'updated_at' => '2019-07-21 11:33:51',
            ),
            array( // row #1
                'id' => 2,
                'name' => 'id_empresa',
                'val' => '0',
                'type' => 'int',
                'empresas_id' => 0,
                'created_at' => '2019-07-21 11:33:51',
                'updated_at' => '2019-07-21 11:33:51',
            ),
           array( // row #2
               'id' => 3,
               'name' => 'ano',
               'val' => '2020',
               'type' => 'string',
               'empresas_id' => 0,
               'created_at' => '2019-07-21 11:33:51',
               'updated_at' => '2019-07-21 11:33:51',
           )
        ));

    }
}
