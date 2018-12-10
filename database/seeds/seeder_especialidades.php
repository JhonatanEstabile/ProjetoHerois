<?php

use Illuminate\Database\Seeder;

class seeder_especialidades extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('especialidades')->insert([ 'nome' => 'Antitanque']);
        DB::table('especialidades')->insert([ 'nome' => 'Ataque em área']);
        DB::table('especialidades')->insert([ 'nome' => 'Ataque a distância']);
        DB::table('especialidades')->insert([ 'nome' => 'Cura']);
        DB::table('especialidades')->insert([ 'nome' => 'Invocação']);
        DB::table('especialidades')->insert([ 'nome' => 'Magia Branca']);
        DB::table('especialidades')->insert([ 'nome' => 'Matador de chefes']);
        DB::table('especialidades')->insert([ 'nome' => 'Tanker']);
    }
}
