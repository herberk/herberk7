<?php

use Illuminate\Database\Seeder;

class girosasTableSeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('girosas')->insert(array(
            array( // row #0
                'id' => 1,
                'name' => 'AGRICULTURA GANADERÍA SILVICULTURA Y PESCA',
                'created_at' => '2018-11-22 00:00:00',
                'updated_at' => '2018-11-22 00:00:00',
            ),
            array( // row #1
                'id' => 2,
                'name' => 'EXPLOTACIÓN DE MINAS Y CANTERAS',
                'created_at' => '2018-11-22 00:00:00',
                'updated_at' => '2018-11-22 00:00:00',
            ),
            array( // row #2
                'id' => 3,
                'name' => 'INDUSTRIA MANUFACTURERA',
                'created_at' => '2018-11-22 00:00:00',
                'updated_at' => '2018-11-22 00:00:00',
            ),
            array( // row #3
                'id' => 4,
                'name' => 'SUMINISTRO DE ELECTRICIDAD GAS VAPOR Y AIRE ACONDICIONADO',
                'created_at' => '2018-11-22 00:00:00',
                'updated_at' => '2018-11-22 00:00:00',
            ),
            array( // row #4
                'id' => 5,
                'name' => 'SUMINISTRO DE AGUA; EVACUACIÓN DE AGUAS RESIDUALES GESTIÓN DE DESECHOS Y DESCONTAMINACIÓN',
                'created_at' => '2018-11-22 00:00:00',
                'updated_at' => '2018-11-22 00:00:00',
            ),
            array( // row #5
                'id' => 6,
                'name' => 'CONSTRUCCIÓN',
                'created_at' => '2018-11-22 00:00:00',
                'updated_at' => '2018-11-22 00:00:00',
            ),
            array( // row #6
                'id' => 7,
                'name' => 'COMERCIO AL POR MAYOR Y AL POR MENOR; REPARACIÓN DE VEHICULOS AUTOMOTORES Y MOTOCICLETAS',
                'created_at' => '2018-11-22 00:00:00',
                'updated_at' => '2018-11-22 00:00:00',
            ),
            array( // row #7
                'id' => 8,
                'name' => 'TRANSPORTE Y ALMACENAMIENTO',
                'created_at' => '2018-11-22 00:00:00',
                'updated_at' => '2018-11-22 00:00:00',
            ),
            array( // row #8
                'id' => 9,
                'name' => 'ACTIVIDADES DE ALOJAMIENTO Y DE SERVICIO DE COMIDAS',
                'created_at' => '2018-11-22 00:00:00',
                'updated_at' => '2018-11-22 00:00:00',
            ),
            array( // row #9
                'id' => 10,
                'name' => 'INFORMACIÓN Y COMUNICACIONES',
                'created_at' => '2018-11-22 00:00:00',
                'updated_at' => '2018-11-22 00:00:00',
            ),
            array( // row #10
                'id' => 11,
                'name' => 'ACTIVIDADES FINANCIERAS Y DE SEGUROS',
                'created_at' => '2018-11-22 00:00:00',
                'updated_at' => '2018-11-22 00:00:00',
            ),
            array( // row #11
                'id' => 12,
                'name' => 'ACTIVIDADES INMOBILIARIAS',
                'created_at' => '2018-11-22 00:00:00',
                'updated_at' => '2018-11-22 00:00:00',
            ),
            array( // row #12
                'id' => 13,
                'name' => 'ACTIVIDADES PROFESIONALES CIENTIFICAS Y TÉCNICAS',
                'created_at' => '2018-11-22 00:00:00',
                'updated_at' => '2018-11-22 00:00:00',
            ),
            array( // row #13
                'id' => 14,
                'name' => 'ACTIVIDADES DE SERVICIOS ADMINISTRATIVOS Y DE APOYO',
                'created_at' => '2018-11-22 00:00:00',
                'updated_at' => '2018-11-22 00:00:00',
            ),
            array( // row #14
                'id' => 15,
                'name' => 'ADMINISTRACIÓN PÚBLICA Y DEFENSA; PLANES DE SEGURIDAD SOCIAL DE AFILIACIÓN OBLIGATORIA',
                'created_at' => '2018-11-22 00:00:00',
                'updated_at' => '2018-11-22 00:00:00',
            ),
            array( // row #15
                'id' => 16,
                'name' => 'ENSEÑANZA',
                'created_at' => '2018-11-22 00:00:00',
                'updated_at' => '2018-11-22 00:00:00',
            ),
            array( // row #16
                'id' => 17,
                'name' => 'ACTIVIDADES DE ATENCIÓN DE LA SALUD HUMANA Y DE ASISTENCIA SOCIAL',
                'created_at' => '2018-11-22 00:00:00',
                'updated_at' => '2018-11-22 00:00:00',
            ),
            array( // row #17
                'id' => 18,
                'name' => 'ACTIVIDADES ARTÍSTICAS DE ENTRETENIMIENTO Y RECREATIVAS',
                'created_at' => '2018-11-22 00:00:00',
                'updated_at' => '2018-11-22 00:00:00',
            ),
            array( // row #18
                'id' => 19,
                'name' => 'OTRAS ACTIVIDADES DE SERVICIOS',
                'created_at' => '2018-11-22 00:00:00',
                'updated_at' => '2018-11-22 00:00:00',
            ),
            array( // row #19
                'id' => 20,
                'name' => 'ACTIVIDADES DE LOS HOGARES COMO EMPLEADORES; ACTIVIDADES NO DIFERENCIADAS DE LOS HOGARES ',
                'created_at' => '2018-11-22 00:00:00',
                'updated_at' => '2018-11-22 00:00:00',
            ),
            array( // row #20
                'id' => 21,
                'name' => 'ACTIVIDADES DE ORGANIZACIONES Y ÓRGANOS EXTRATERRITORIALES',
                'created_at' => '2018-11-22 00:00:00',
                'updated_at' => '2018-11-22 00:00:00',
            ),
        ));
    }
}
