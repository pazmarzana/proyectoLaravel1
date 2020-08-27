<?php

use Illuminate\Database\Seeder;

class rellenaNotas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for($i=0;$i<=40;$i++){
           DB::table('notes')->insert(
            array(
                'title'=>'Mi nota ' . $i,
                'description'=>'La descripcion de la nota ' . $i
            )//cierre array
           );//cierre insert
       }//cierra for
       $this->command->info('Tabla de Notas rellenado correctamente');
    }//cierra funcion
}
