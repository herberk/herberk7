<?php

use Illuminate\Database\Seeder;

class CiudadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        \DB::table('ciudades')->insert(array(
            array('id' => '1','name' => 'Villarrica','codigo' => '0','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '2','name' => 'Temuco','codigo' => '0','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '4','name' => 'Angol','codigo' => '0','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '5','name' => 'Victoria','codigo' => '0','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '6','name' => 'Santiago','codigo' => '0','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '7','name' => 'Ancud','codigo' => NULL,'created_at' => '2020-08-17 13:32:06','updated_at' => '2020-08-17 13:32:06'),
            array('id' => '8','name' => 'Pucon','codigo' => NULL,'created_at' => '2020-08-17 13:36:58','updated_at' => '2020-08-17 13:36:58'),
            array('id' => '10','name' => 'Valparaiso','codigo' => NULL,'created_at' => '2020-08-18 10:46:06','updated_at' => '2020-08-18 10:46:06'),
            array('id' => '11','name' => 'Vilcun','codigo' => NULL,'created_at' => '2020-08-18 10:51:01','updated_at' => '2020-08-18 10:51:01'),
            array('id' => '12','name' => 'Freire','codigo' => NULL,'created_at' => '2020-08-18 10:53:36','updated_at' => '2020-08-18 10:53:36'),
            array('id' => '18','name' => 'Chol chol','codigo' => NULL,'created_at' => '2020-08-18 15:48:08','updated_at' => '2020-08-18 15:48:08'),
            array('id' => '19','name' => 'Talcahuano','codigo' => NULL,'created_at' => '2020-08-18 15:48:22','updated_at' => '2020-08-18 15:48:22'),
            array('id' => '20','name' => 'Pitrufquen','codigo' => '123','created_at' => '2020-08-18 15:50:29','updated_at' => '2020-08-18 15:50:29'),
            array('id' => '21','name' => 'Contulmo','codigo' => NULL,'created_at' => '2020-08-18 15:52:00','updated_at' => '2020-08-18 15:52:00'),
            array('id' => '22','name' => 'Los Angeles','codigo' => NULL,'created_at' => '2020-08-18 15:56:29','updated_at' => '2020-08-18 15:56:29'),
            array('id' => '23','name' => 'Cunco','codigo' => NULL,'created_at' => '2020-08-18 15:56:44','updated_at' => '2020-08-18 15:56:44')
    ));
    }
}
