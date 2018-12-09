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
        DB::table('especialidades')->insert([ 'nome' => 'Cura em area']);
        DB::table('especialidades')->insert([ 'nome' => 'Magia de Gelo']);
        DB::table('especialidades')->insert([ 'nome' => 'Dano Critico']);
        DB::table('especialidades')->insert([ 'nome' => 'Dupla empunhadura']);
        DB::table('especialidades')->insert([ 'nome' => 'Defesa Impenetravel']);
    }
}
