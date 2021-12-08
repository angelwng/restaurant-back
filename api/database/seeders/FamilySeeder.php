<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('familys')->insert([
            'name' => 'DESAYUNOS COMPLETOS',
            'description' => 'Desayunos completos combos',          
            'status' => true,
        ]);
        DB::table('familys')->insert([
            'name' => 'JAROCHO',
            'description' => 'Lo tipico jarocho',          
            'status' => true,
        ]);
        DB::table('familys')->insert([
            'name' => 'DE LA GRANJA',
            'description' => 'De la granja, incluye frijoles y 1 orden de tortillas',          
            'status' => true,
        ]);
        DB::table('familys')->insert([
            'name' => 'EMPAREDADO',
            'description' => 'Emparedados',          
            'status' => true,
        ]);
        DB::table('familys')->insert([
            'name' => 'CALDITOS',
            'description' => 'Calditos',          
            'status' => true,
        ]);
        DB::table('familys')->insert([
            'name' => 'CARNES Y POLLO',
            'description' => 'Carnes y pollo',          
            'status' => true,
        ]);
        DB::table('familys')->insert([
            'name' => 'SALUDABLE',
            'description' => 'Saludable',          
            'status' => true,
        ]);
        DB::table('familys')->insert([
            'name' => 'EXTRAS',
            'description' => 'Extras',          
            'status' => true,
        ]);
        DB::table('familys')->insert([
            'name' => 'BEBIDAS',
            'description' => 'Bebidas',          
            'status' => true,
        ]);
    }
}
