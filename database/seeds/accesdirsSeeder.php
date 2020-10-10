<?php

use Illuminate\Database\Seeder;

class accesdirsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('accesdirs')->insert(array(
            array('id' => '1','name' => 'Lista Capital Propio Tributario','ruta' => 'capital','active' => '1','created_at' => NULL,'updated_at' => '2020-07-07 12:38:07'),
            array('id' => '2','name' => 'Listado de Empresas','ruta' => 'empresaindex','active' => '1','created_at' => NULL,'updated_at' => '2020-07-07 12:38:07'),
            array('id' => '3','name' => 'Listado de Configuraciones','ruta' => '/settings','active' => '1','created_at' => NULL,'updated_at' => '2020-07-07 12:38:07'),
            array('id' => '4','name' => 'Listado de Actividades','ruta' => '/activiti','active' => '1','created_at' => NULL,'updated_at' => '2020-07-07 12:38:07'),
            array('id' => '5','name' => 'Exportar a Excel Configuraciones','ruta' => '/exportset','active' => '1','created_at' => NULL,'updated_at' => '2020-07-07 12:38:07'),
            array('id' => '6','name' => 'Exportar a Excel Actividades','ruta' => '/exportact','active' => '1','created_at' => NULL,'updated_at' => '2020-07-07 12:38:07'),
            array('id' => '7','name' => 'Salir de la Aplicación','ruta' => '/logout','active' => '0','created_at' => NULL,'updated_at' => '2020-07-07 12:25:22'),
            array('id' => '8','name' => 'Lista de Usuarios de la aplicacion','ruta' => 'usuarios','active' => '1','created_at' => NULL,'updated_at' => '2020-07-07 12:38:07'),
            array('id' => '9','name' => 'Exportar Lista de Usuarios','ruta' => 'Exports','active' => '1','created_at' => NULL,'updated_at' => '2020-07-07 12:38:07'),
            array('id' => '11','name' => 'Tabla de giros o actividad SII','ruta' => 'giros','active' => '1','created_at' => NULL,'updated_at' => '2020-07-07 12:38:07'),
            array('id' => '12','name' => 'Tabla de categorías','ruta' => '/Tipo_atributo','active' => '1','created_at' => NULL,'updated_at' => '2020-07-07 12:38:07'),
            array('id' => '13','name' => 'Tabla regiones comunas ciudades','ruta' => 'locaciones/','active' => '1','created_at' => NULL,'updated_at' => '2020-07-07 12:38:07'),
            array('id' => '14','name' => 'Crear una nueva Empresa','ruta' => 'creatempresa','active' => '1','created_at' => NULL,'updated_at' => '2020-07-07 12:38:07'),
            array('id' => '15','name' => 'Crear una nueva Ciudad','ruta' => '/ciudadcreate','active' => '0','created_at' => NULL,'updated_at' => '2020-07-07 12:25:22'),
            array('id' => '16','name' => 'Tabla de Índices y Valores ','ruta' => 'listaunidad','active' => '1','created_at' => NULL,'updated_at' => '2020-07-07 12:38:07'),
            array('id' => '17','name' => 'Archivos de empresas','ruta' => 'file/show','active' => '1','created_at' => NULL,'updated_at' => '2020-07-07 12:38:07'),
            array('id' => '18','name' => 'Archivos directorios','ruta' => 'listacategori','active' => '1','created_at' => NULL,'updated_at' => '2020-07-07 12:38:07'),
            array('id' => '19','name' => 'Archivos listado','ruta' => 'fileslista','active' => '1','created_at' => NULL,'updated_at' => '2020-07-07 12:38:07')
        ));
    }
}
