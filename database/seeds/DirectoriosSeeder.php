<?php

use Illuminate\Database\Seeder;

class DirectoriosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('Directorios')->insert(array(
            array(
                "id" => 10,
                "ano" => "2018",
                "name" => "2018  General",
                "empresas_id" => 2,
                "created_at" => "2019-06-28 13:16:52",
                "updated_at" => "2019-06-28 13:16:52",
            ),
            array(
                "id" => 11,
                "ano" => "2017",
                "name" => "2017  iva",
                "empresas_id" => 3,
                "created_at" => "2019-06-28 14:19:02",
                "updated_at" => "2019-06-28 14:19:02",
            ),
            array(
                "id" => 12,
                "ano" => "2017",
                "name" => "2017  Ejercicio",
                "empresas_id" => 8,
                "created_at" => "2019-06-28 14:37:41",
                "updated_at" => "2019-06-28 14:37:41",
            ),
        ));
    }

}
