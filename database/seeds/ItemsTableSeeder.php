<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('items')->insert(array(
            array('id' => '1','name' => 'Factura','codigo' => '','categoria_id' => '1','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '2','name' => 'Factura de exportación','codigo' => '','categoria_id' => '1','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '3','name' => 'Boleta','codigo' => '','categoria_id' => '1','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '4','name' => 'Boleta Honorarios','codigo' => '','categoria_id' => '1','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '5','name' => 'Sin documento','codigo' => '','categoria_id' => '1','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '6','name' => 'Otro tipo de documento','codigo' => '','categoria_id' => '1','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '7','name' => 'Pesos Chile','codigo' => '$','categoria_id' => '2','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '8','name' => 'Pesos Argentina','codigo' => '','categoria_id' => '2','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '9','name' => 'Euro','codigo' => 'EUR','categoria_id' => '2','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '10','name' => 'Dolar Americano','codigo' => 'USD','categoria_id' => '2','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '11','name' => 'Venta de bienes del giro','codigo' => '','categoria_id' => '3','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '12','name' => 'Venta de bienes que no son del giro','codigo' => '','categoria_id' => '3','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '13','name' => 'Prestación de servicios del giro','codigo' => '','categoria_id' => '3','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '14','name' => 'Prestación de otros servicios','codigo' => '','categoria_id' => '3','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '15','name' => 'Operación de crédito de dinero','codigo' => '','categoria_id' => '3','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '16','name' => 'Letra de cambio','codigo' => '','categoria_id' => '4','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '17','name' => 'Pagaré','codigo' => '','categoria_id' => '4','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '18','name' => 'Cheque','codigo' => '','categoria_id' => '4','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '19','name' => 'Escritura pública','codigo' => '','categoria_id' => '4','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '20','name' => 'Escritura privada','codigo' => '','categoria_id' => '4','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '21','name' => 'No se emitió documento','codigo' => '','categoria_id' => '4','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '22','name' => 'Incumplimiento al requerimiento de pago','codigo' => '','categoria_id' => '5','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '23','name' => 'Quiebra del deudor','codigo' => '','categoria_id' => '5','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '24','name' => 'Deudor inubicable o desaparecido','codigo' => '','categoria_id' => '5','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '25','name' => 'Fallecimiento del deudor','codigo' => '','categoria_id' => '5','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '26','name' => 'Cesación de pagos del deudor hecha valer ante un Tribunal','codigo' => '','categoria_id' => '5','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '27','name' => 'Persona Natural','codigo' => '','categoria_id' => '6','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '28','name' => 'Soc. de Responsabilidad Limitada','codigo' => '','categoria_id' => '6','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '29','name' => 'Soc. Anonima Cerrada','codigo' => NULL,'categoria_id' => '6','created_at' => '2017-08-22 20:10:39','updated_at' => '2019-05-14 10:42:01'),
            array('id' => '30','name' => 'Soc. Anonima por accion','codigo' => '','categoria_id' => '6','created_at' => '2017-08-22 20:10:39','updated_at' => '2017-08-22 20:10:39'),
            array('id' => '31','name' => 'Pro pyme General','codigo' => NULL,'categoria_id' => '7','created_at' => '2017-08-22 20:10:39','updated_at' => '2020-08-31 13:08:34'),
            array('id' => '32','name' => 'Pro pyme Transparente','codigo' => NULL,'categoria_id' => '7','created_at' => '2017-08-22 20:10:39','updated_at' => '2020-08-31 13:08:59'),
            array('id' => '33','name' => 'Regimen General','codigo' => NULL,'categoria_id' => '7','created_at' => '2017-08-22 20:10:39','updated_at' => '2020-08-31 13:09:29'),
            array('id' => '34','name' => 'Banco de Chile','codigo' => NULL,'categoria_id' => '8','created_at' => '2018-05-15 15:44:32','updated_at' => '2018-05-15 15:44:32'),
            array('id' => '35','name' => 'Banco BCI','codigo' => NULL,'categoria_id' => '8','created_at' => '2018-05-15 15:44:45','updated_at' => '2018-05-15 15:44:45'),
            array('id' => '36','name' => 'Banco santander','codigo' => NULL,'categoria_id' => '8','created_at' => '2018-05-15 15:45:01','updated_at' => '2018-05-15 15:45:01'),
            array('id' => '37','name' => '1887 Sueldos','codigo' => '1887','categoria_id' => '9','created_at' => '2019-01-09 16:58:47','updated_at' => '2019-01-09 16:58:47'),
            array('id' => '38','name' => '1941 Retiros o dividendos 14 B','codigo' => '1941','categoria_id' => '9','created_at' => '2019-01-09 16:59:17','updated_at' => '2019-01-09 16:59:17'),
            array('id' => '39','name' => '1835 Arriendos','codigo' => '1835','categoria_id' => '9','created_at' => '2019-01-09 16:59:52','updated_at' => '2019-01-09 16:59:52'),
            array('id' => '40','name' => '1879 Honorarios','codigo' => '1879','categoria_id' => '9','created_at' => '2019-01-09 17:00:08','updated_at' => '2019-01-09 17:00:08'),
            array('id' => '41','name' => '1909 Gastos Rechazados','codigo' => '1909','categoria_id' => '9','created_at' => '2019-01-09 17:00:32','updated_at' => '2019-01-09 17:00:32'),
            array('id' => '42','name' => '1923 Renta liquida imp. 14A','codigo' => '1923','categoria_id' => '9','created_at' => '2019-01-09 17:01:19','updated_at' => '2019-01-09 17:01:19'),
            array('id' => '43','name' => '1924 Base Imponible 14 Ter','codigo' => '1924','categoria_id' => '9','created_at' => '2019-01-09 17:01:58','updated_at' => '2019-01-09 17:01:58'),
            array('id' => '44','name' => '1940 Retiros o dividendos 14A','codigo' => '1940','categoria_id' => '9','created_at' => '2019-01-09 17:02:42','updated_at' => '2019-01-09 17:02:42'),
            array('id' => '45','name' => '1942 Dividendos 14B','codigo' => '1942','categoria_id' => '9','created_at' => '2019-01-09 17:03:11','updated_at' => '2019-01-09 17:03:11'),
            array('id' => '46','name' => '1943 Renta presunta','codigo' => '1943','categoria_id' => '9','created_at' => '2019-01-09 17:03:39','updated_at' => '2019-01-09 17:03:39'),
            array('id' => '47','name' => '1847 Balance y Capita P.Tribu','codigo' => '1847','categoria_id' => '9','created_at' => '2019-01-09 17:04:33','updated_at' => '2019-01-09 17:04:33'),
            array('id' => '48','name' => '1926 Renta Liquida impo. 14 B','codigo' => '1926','categoria_id' => '9','created_at' => '2019-01-09 17:05:31','updated_at' => '2019-01-09 17:05:31'),
            array('id' => '49','name' => '1938 Registro renta Empres 14 A','codigo' => '1938','categoria_id' => '9','created_at' => '2019-01-09 17:06:32','updated_at' => '2019-01-09 17:07:04'),
            array('id' => '50','name' => '1939 Registro renta Empres 14 B','codigo' => '1939','categoria_id' => '9','created_at' => '2019-01-09 17:06:48','updated_at' => '2019-01-09 17:06:48'),
            array('id' => '51','name' => '1837 Pagos Prov. a disposición','codigo' => '1837','categoria_id' => '9','created_at' => '2019-01-09 17:07:40','updated_at' => '2019-01-09 17:07:40'),
            array('id' => '52','name' => '1932 Rentas obtenidas por 3ºro','codigo' => '1932','categoria_id' => '9','created_at' => '2019-02-20 17:05:41','updated_at' => '2019-02-20 17:05:41'),
            array('id' => '53','name' => 'Pendiente por declarar','codigo' => NULL,'categoria_id' => '10','created_at' => '2019-03-07 13:09:06','updated_at' => '2019-03-07 13:09:06'),
            array('id' => '54','name' => 'Declarada en proceso','codigo' => NULL,'categoria_id' => '10','created_at' => '2019-03-07 13:09:33','updated_at' => '2019-03-07 13:09:33'),
            array('id' => '55','name' => 'D.J. Aceptada','codigo' => NULL,'categoria_id' => '10','created_at' => '2019-03-07 13:10:23','updated_at' => '2019-03-07 13:10:23'),
            array('id' => '57','name' => 'D.J. Observada','codigo' => NULL,'categoria_id' => '10','created_at' => '2019-03-07 13:11:56','updated_at' => '2019-03-07 13:11:56'),
            array('id' => '58','name' => 'Soc. Anónima Abierta','codigo' => NULL,'categoria_id' => '6','created_at' => '2019-05-14 10:42:46','updated_at' => '2019-05-14 10:42:46'),
            array('id' => '59','name' => 'Renta Presunta','codigo' => NULL,'categoria_id' => '7','created_at' => '2020-08-31 13:09:53','updated_at' => '2020-08-31 13:09:53'),
            array('id' => '60','name' => 'Contribuyentes no sujetos al 14 de la LIR','codigo' => NULL,'categoria_id' => '7','created_at' => '2020-08-31 13:10:33','updated_at' => '2020-08-31 13:10:33'),
            array('id' => '61','name' => 'Personas','codigo' => NULL,'categoria_id' => '11','created_at' => '2020-08-31 13:14:09','updated_at' => '2020-08-31 13:14:09'),
            array('id' => '62','name' => 'Micro Empresa','codigo' => NULL,'categoria_id' => '11','created_at' => '2020-08-31 13:14:30','updated_at' => '2020-08-31 13:14:30'),
            array('id' => '63','name' => 'Pequeñas Empresas','codigo' => NULL,'categoria_id' => '11','created_at' => '2020-08-31 13:14:50','updated_at' => '2020-08-31 13:14:50'),
            array('id' => '64','name' => 'Mediana Empresa','codigo' => NULL,'categoria_id' => '11','created_at' => '2020-08-31 13:15:07','updated_at' => '2020-08-31 13:15:07'),
            array('id' => '65','name' => 'Gran Empresa','codigo' => NULL,'categoria_id' => '11','created_at' => '2020-08-31 13:15:25','updated_at' => '2020-08-31 13:15:25')

        ));
    }
}
