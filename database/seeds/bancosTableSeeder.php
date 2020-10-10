<?php

use Illuminate\Database\Seeder;

class bancosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('bancos')->insert(array(
            array('id' => '1','name' => 'Banco Bice','ctacte' => '10-00815-8','firman' => 'Hermann Berkhoff Herbert Massmann Mariana Wyneken','ruta' => 'https://login.bice.cl/loginempresa/','montoLin' => '0','notas' => NULL,'empresas_id' => '2','deleted_at' => NULL,'created_at' => '2019-04-06 11:17:09','updated_at' => '2020-08-17 15:53:23'),
            array('id' => '2','name' => 'Banco Segurity','ctacte' => '26309501','firman' => 'Carl Fingerhuth   Hermann Berkhoff','ruta' => 'https://empresas.bancosecurity.cl/','montoLin' => '0','notas' => '<p>Firma don Carlito y yo tambien</p>','empresas_id' => '4','deleted_at' => NULL,'created_at' => '2019-04-17 10:51:02','updated_at' => '2020-08-21 11:09:50'),
            array('id' => '3','name' => 'Banco Bice','ctacte' => '10-00801-8','firman' => 'Christian Luder    Herbert Massmann','ruta' => 'https://login.bice.cl/loginempresa/','montoLin' => '0','notas' => NULL,'empresas_id' => '6','deleted_at' => NULL,'created_at' => '2019-04-18 12:38:12','updated_at' => '2020-08-17 16:33:32'),
            array('id' => '4','name' => 'Banco Bice','ctacte' => '10-00534-5','firman' => 'Herbert Massmann Inge Massmann','ruta' => 'https://login.bice.cl/loginempresa/','montoLin' => '0','notas' => NULL,'empresas_id' => '8','deleted_at' => NULL,'created_at' => '2019-04-18 16:23:49','updated_at' => '2020-08-17 16:33:41'),
            array('id' => '5','name' => 'IVA','ctacte' => '1 (10-00815-8)','firman' => '  ','ruta' => NULL,'montoLin' => NULL,'notas' => NULL,'empresas_id' => '12','deleted_at' => '2020-05-14 10:30:51','created_at' => '2020-05-14 10:30:44','updated_at' => '2020-05-14 10:30:51'),
            array('id' => '6','name' => 'Chile','ctacte' => '240-10099-09','firman' => 'Herbert Massmann      Cristian Lüders','ruta' => 'https://login.bancochile.cl/bancochile-web/persona/login/index.html#/login','montoLin' => '5000000','notas' => NULL,'empresas_id' => '7','deleted_at' => NULL,'created_at' => '2020-05-14 10:45:10','updated_at' => '2020-08-21 10:10:44'),
            array('id' => '7','name' => 'Chile','ctacte' => '240-03911-04','firman' => 'Herbert Massmann','ruta' => NULL,'montoLin' => NULL,'notas' => NULL,'empresas_id' => '11','deleted_at' => NULL,'created_at' => '2020-05-14 12:38:45','updated_at' => '2020-05-14 12:49:58'),
            array('id' => '8','name' => 'Banco Bice','ctacte' => '10-73158-5','firman' => NULL,'ruta' => 'https://login.bice.cl/loginempresa/','montoLin' => '0','notas' => NULL,'empresas_id' => '10','deleted_at' => NULL,'created_at' => '2020-08-17 15:54:42','updated_at' => '2020-08-17 15:54:42'),
            array('id' => '9','name' => 'Banco Chile','ctacte' => '00-240-12409-10','firman' => 'Herbert Massmann','ruta' => 'https://login.bancochile.cl/bancochile-web/empresa/login/index.html#/login','montoLin' => '0','notas' => NULL,'empresas_id' => '6','deleted_at' => NULL,'created_at' => '2020-08-17 15:56:31','updated_at' => '2020-08-21 11:07:00'),
            array('id' => '10','name' => 'Banco Santander','ctacte' => '2572441-0','firman' => 'Herbert Massmann Mariana Wyneken','ruta' => 'https://www.officebanking.cl/default.htm','montoLin' => '0','notas' => NULL,'empresas_id' => '5','deleted_at' => NULL,'created_at' => '2020-08-17 16:01:28','updated_at' => '2020-08-21 11:08:19'),
            array('id' => '11','name' => 'Banco Chile','ctacte' => '00240-10502-08','firman' => 'Mariana Wineken H','ruta' => 'https://login.bancochile.cl/bancochile-web/empresa/login/index.html#/login','montoLin' => '0','notas' => NULL,'empresas_id' => '5','deleted_at' => NULL,'created_at' => '2020-08-17 16:02:42','updated_at' => '2020-08-21 11:06:28'),
            array('id' => '12','name' => 'Banco BCI','ctacte' => '66103029','firman' => 'Herbert Massmann Cristian Lüders','ruta' => 'https://www.bci.cl/empresas/','montoLin' => '0','notas' => NULL,'empresas_id' => '7','deleted_at' => NULL,'created_at' => '2020-08-17 16:04:12','updated_at' => '2020-08-21 10:11:36'),
            array('id' => '13','name' => 'Banco Bice','ctacte' => '10014425','firman' => 'Herbert Massmann Inge Massmann','ruta' => 'https://login.bice.cl/loginempresa/','montoLin' => '0','notas' => NULL,'empresas_id' => '9','deleted_at' => NULL,'created_at' => '2020-08-17 16:08:00','updated_at' => '2020-08-17 16:08:00'),
            array('id' => '14','name' => 'Banco Chile','ctacte' => '2401343406','firman' => 'Herbert Massmann Inge Massmann','ruta' => NULL,'montoLin' => '0','notas' => NULL,'empresas_id' => '9','deleted_at' => NULL,'created_at' => '2020-08-17 16:08:52','updated_at' => '2020-08-17 16:08:52'),
            array('id' => '15','name' => 'Bco Chile Pesos','ctacte' => '144-00556-05','firman' => 'Maria Elena Hillbrecht Wageman   Carlos Quintana firma electronica','ruta' => 'https://login.bancochile.cl/bancochile-web/persona/login/index.html#/login','montoLin' => '0','notas' => NULL,'empresas_id' => '3','deleted_at' => NULL,'created_at' => '2020-08-17 16:15:16','updated_at' => '2020-08-21 10:09:49'),
            array('id' => '16','name' => 'Chile dolares','ctacte' => '05-144-00556-10','firman' => 'Maria Elena Hillbrecht Wageman Carlos Quintana firma electronica','ruta' => 'https://login.bancochile.cl/bancochile-web/persona/login/index.html#/login','montoLin' => '0','notas' => NULL,'empresas_id' => '3','deleted_at' => NULL,'created_at' => '2020-08-17 16:16:43','updated_at' => '2020-08-21 10:10:14'),
            array('id' => '17','name' => 'Santander Pesos','ctacte' => '6405886-0','firman' => 'Maria Elena Hillbrecht Wageman Carlos Quintana firma electronica','ruta' => 'https://www.officebanking.cl/default.htm','montoLin' => '0','notas' => NULL,'empresas_id' => '3','deleted_at' => NULL,'created_at' => '2020-08-17 16:17:38','updated_at' => '2020-08-21 11:08:36'),
            array('id' => '18','name' => 'Internac. Pesos','ctacte' => '9061671','firman' => 'Maria Elena Hillbrecht Wageman Carlos Quintana firma electronica','ruta' => NULL,'montoLin' => '0','notas' => NULL,'empresas_id' => '3','deleted_at' => NULL,'created_at' => '2020-08-17 16:22:57','updated_at' => '2020-08-17 16:22:57'),
            array('id' => '19','name' => 'Internac. dolar','ctacte' => '9106929','firman' => 'Maria Elena Hillbrecht Wageman Carlos Quintana firma electronica','ruta' => NULL,'montoLin' => '0','notas' => NULL,'empresas_id' => '3','deleted_at' => NULL,'created_at' => '2020-08-17 16:24:31','updated_at' => '2020-08-17 16:24:31')

      ));
    }
}
