<?php

use Illuminate\Database\Seeder;

class seeder_classes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([ 'nome' => 'Arqueiro']);
        DB::table('classes')->insert([ 'nome' => 'Cavaleiro']);
        DB::table('classes')->insert([ 'nome' => 'Mago']);
        DB::table('classes')->insert([ 'nome' => 'Sacerdote']);
        DB::table('classes')->insert([ 'nome' => 'Lutador']);
    }
}
