<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('messages')->insert(array(
            array('id' => '1','name' => 'Juanita Lagos','email' => 'juanida@delagos.cl','message' => 'El jaro se rompió y nadie respondio, quien paga ??','active' => '2','user_id' => '2','tipo' => '2','deleted_at' => NULL,'created_at' => '2019-06-11 12:32:14','updated_at' => '2019-06-11 12:32:14'),
            array('id' => '2','name' => 'fdfdgsdfgsgdf','email' => 'lñkjj@hhhdf.cl','message' => 'ergeqrgerger gqeregrgeqrger rgegegergre geggerqqe rer  sdaljkkhn  fdweklhj dfewwkl ewfg weewew fewkljhjew','active' => '2','user_id' => '1','tipo' => '2','deleted_at' => NULL,'created_at' => '2019-06-11 12:33:31','updated_at' => '2019-06-11 12:33:31'),
            array('id' => '3','name' => NULL,'email' => NULL,'message' => 'hols','active' => '1','user_id' => '2','tipo' => '1','deleted_at' => NULL,'created_at' => '2020-06-12 12:17:05','updated_at' => '2020-06-12 12:17:05'),
            array('id' => '4','name' => NULL,'email' => NULL,'message' => 'fdfdfdfd','active' => '1','user_id' => '2','tipo' => '1','deleted_at' => NULL,'created_at' => '2020-06-12 12:17:10','updated_at' => '2020-06-12 12:17:10'),
            array('id' => '5','name' => NULL,'email' => NULL,'message' => 'fdffd','active' => '1','user_id' => '2','tipo' => '1','deleted_at' => NULL,'created_at' => '2020-06-12 12:17:15','updated_at' => '2020-06-12 12:17:15'),
            array('id' => '6','name' => 'Hermann Berkhoff','email' => 'hberkhoff@gmail.com','message' => 'me sacaron con el nuevo mensaje','active' => '1','user_id' => '1','tipo' => '2','deleted_at' => NULL,'created_at' => '2020-06-15 09:52:08','updated_at' => '2020-06-15 09:52:08'),
            array('id' => '7','name' => 'Hermann Berkhoff','email' => 'hberkhoff@gmail.com','message' => 'vfgfgdfgdfdfdfd','active' => '1','user_id' => '1','tipo' => '2','deleted_at' => NULL,'created_at' => '2020-06-15 10:06:03','updated_at' => '2020-06-15 10:06:03'),
            array('id' => '8','name' => NULL,'email' => NULL,'message' => 'hola con tipo en la taba','active' => '1','user_id' => '2','tipo' => '1','deleted_at' => NULL,'created_at' => '2020-06-15 10:22:08','updated_at' => '2020-06-15 10:22:08'),
            array('id' => '9','name' => 'maria guata fria','email' => 'maria@gtatece.com','message' => 'mesaje aguevonao','active' => '1','user_id' => '1','tipo' => '2','deleted_at' => NULL,'created_at' => '2020-06-15 10:30:59','updated_at' => '2020-06-15 10:30:59'),
            array('id' => '10','name' => NULL,'email' => NULL,'message' => 'Mi primer mensaje a toda la audiencia','active' => '1','user_id' => '2','tipo' => '1','deleted_at' => NULL,'created_at' => '2020-06-15 15:00:55','updated_at' => '2020-06-15 15:00:55'),
            array('id' => '11','name' => NULL,'email' => NULL,'message' => 'Este mensaaje esta dirigido a LA comunidad toda desde otro usuario','active' => '1','user_id' => '1','tipo' => '1','deleted_at' => NULL,'created_at' => '2020-06-15 15:03:08','updated_at' => '2020-06-15 15:03:08')
        ));
    }
}
