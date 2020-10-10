<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([

            'accesdirs',
            'categorias',
            'Bancos',
            'Directorios',
            'Ciudades',
            'Comunas',
            'Contactos',
            'Empresas',
            'empresa_juradas',
            'Ficheros',
            'capitals',
            'Girosas',
            'Girosbs',
            'Giros',
            'helps',
            'items',
            'Juradas',
            'professions',
            'messages',
            'meses',
            'Regiones',
            'Recuentos',
            'skills',
            'Socios',
            'teams',
            'unidadvalores',
            'users',
            'user_profiles',
            'user_skill',
            'valcapitals'

        ]);
//        $this->connection('dbsql')->truncateTables([
//          'Settings'
//
//        ]);

        $this->call([
            MesesSeeder::class,
            accesdirsSeeder::class,
            SettingsTableSeeder::class,
            CategoriasTableSeeder::class,
            ItemsTableSeeder::class,
            CiudadesTableSeeder::class,
            RegionesTableSeeder::class,
            ComunasTableSeeder::class,
            EmpresasTableSeeder::class,
            DirectoriosSeeder::class,
            FicherosSeeder::class,
            girosasTableSeder::class,
            girosbsTableSeder::class,
            GirosTableSeeder::class,
            helpTableSeeder::class,
            JuradasTableSeeder::class,
            ContactosTableSeeder::class,
            bancosTableSeeder::class,
            SociosTableSeeder::class,
            ProfessionSeeder::class,
            SkillSeeder::class,
            TeamSeeder::class,
            UserSeeder::class,
            MessagesTableSeeder::class,
            empresa_juradaTableSeeder::class,
            capitalsTableSeeder::class,
            valcapitalsTableSeeder::class,
            UnidadvaloresTableSeeder::class,
            RecuentosSeeder::class,
        ]);
        $this->command->warn('All done = Todo bien :)');
    }

    protected function truncateTables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }

}
