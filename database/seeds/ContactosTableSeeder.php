<?php

use Illuminate\Database\Seeder;

class ContactosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('Contactos')->insert(array(
            array(
                "id" => 1,
                "rut" => "8276861-0",
                "name" => "Hermann Berkhoff Felis",
                "email" => "Hermann@berkhoff.cl",
                "fono" => "45-2987654  y cel 87695505",
                "notas" => NULL,
                "empresas_id" => 2,
                "deleted_at" => NULL,
                "created_at" => "2018-05-16 13:59:12",
                "updated_at" => "2020-04-25 12:50:36",
            ),
            array(
                "id" => 2,
                "rut" => "16632114-K",
                "name" => "Susana Sandoval Tapia",
                "email" => "Susana@gemail.com",
                "fono" => "56-971048063",
                "notas" => NULL,
                "empresas_id" => 2,
                "deleted_at" => NULL,
                "created_at" => "2018-05-16 13:59:49",
                "updated_at" => "2020-04-24 18:02:50",
            ),
            array(
                "id" => 3,
                "rut" => NULL,
                "name" => "Ana Barria Ibersen",
                "email" => "Abariia@gmail.com",
                "fono" => "45-294321",
                "notas" => NULL,
                "empresas_id" => 2,
                "deleted_at" => "2020-04-19 12:47:49",
                "created_at" => "2018-05-16 14:00:42",
                "updated_at" => "2020-04-19 12:47:49",
            ),
            array(
                "id" => 4,
                "rut" => "15259790-8",
                "name" => "Miguel Angel Melo",
                "email" => "adm.cente@gmail.com",
                "fono" => "45-2544734",
                "notas" => "<p>Maria Elena Hillbrecht Wageman Fono 98726514<br />\r\nSergio Heise Fernandez Fono 98876393<br />\r\n<br />\r\nConexi&oacute;n escritorio asp.eugcom.com<br />\r\ndaniel2<br />\r\ndaniel370<br />\r\nPRG Contabilidad usuario:1004<br />\r\nClave 9889<br />\r\nMiguel 452544734<br />\r\ncacoquintana@gmail.com</p>",
                "empresas_id" => 3,
                "deleted_at" => NULL,
                "created_at" => "2019-11-25 10:47:47",
                "updated_at" => "2020-04-24 17:49:30",
            ),
            array(
                "id" => 5,
                "rut" => "10561931-6",
                "name" => "Eliana Pe�a Estrada",
                "email" => "elypena@gmail.com",
                "fono" => "+56 9 6314 4300  cel",
                "notas" => NULL,
                "empresas_id" => 2,
                "deleted_at" => NULL,
                "created_at" => "2020-04-18 11:36:44",
                "updated_at" => "2020-04-25 12:49:56",
            ),
            array(
                "id" => 6,
                "rut" => "12194504-5",
                "name" => "Redel Redel Yenny",
                "email" => "yredel@mcoingenieria.cl",
                "fono" => "56988065400",
                "notas" => NULL,
                "empresas_id" => 6,
                "deleted_at" => NULL,
                "created_at" => "2020-04-25 15:22:49",
                "updated_at" => "2020-04-25 15:24:45",
            ),
        ));
    }

}
