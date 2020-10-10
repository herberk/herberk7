<?php

use Illuminate\Database\Seeder;

class FicherosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('Ficheros')->insert(array(
            array(
                "id" => 23,
                "name" => "3230.pdf",
                "size" => 650354,
                "extension" => "pdf",
                "public_url" => "Empresas/ASA/2018  General/3230.pdf",
                "directorio" => "2018  General",
                "directorio_id" => 10,
                "empresa" => "ASA",
                "empresas_id" => 2,
                "deleted_at" => NULL,
                "created_at" => "2019-06-28 14:16:39",
                "updated_at" => "2019-06-28 14:16:39",
            ),
            array(
                "id" => 24,
                "name" => "Form 29 IVA Cente 01-2019.pdf",
                "size" => 32939,
                "extension" => "pdf",
                "public_url" => "Empresas/Cente/2017  iva/Form 29 IVA Cente 01-2019.pdf",
                "directorio" => "2017  iva",
                "directorio_id" => 11,
                "empresa" => "Cente",
                "empresas_id" => 3,
                "deleted_at" => NULL,
                "created_at" => "2019-06-28 14:19:37",
                "updated_at" => "2019-06-28 14:19:37",
            ),
            array(
                "id" => 25,
                "name" => "Imprimir TarjetaHBF.pdf",
                "size" => 16436,
                "extension" => "pdf",
                "public_url" => "Empresas/ASA/2018  General/Imprimir TarjetaHBF.pdf",
                "directorio" => "2018  General",
                "directorio_id" => 10,
                "empresa" => "ASA",
                "empresas_id" => 2,
                "deleted_at" => NULL,
                "created_at" => "2019-06-28 14:21:22",
                "updated_at" => "2019-06-28 14:21:22",
            ),
        ));
    }

}
