<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            'name' => 'Americano',
            'description' => 'Molletes, acompanados de frijoles refritos queso manchego y pico de gallo',          
            'url_image' => null,
            'id_family' => 1,
            'price' => 65,
            'status' => true,
        ]);
        DB::table('products')->insert([
            'name' => 'Poblano',
            'description' => 'Enchiladas, orden de 3 piezas rojas o de mole, rellenas de pollo o queso de hebra',          
            'url_image' => null,
            'id_family' => 1,
            'price' => 79,
            'status' => true,
        ]);
        DB::table('products')->insert([
            'name' => 'Como en casa',
            'description' => 'Huevos al gusto, revueltos (con jamon o chorizo) a la mexicana o tirados',          
            'url_image' => null,
            'id_family' => 1,
            'price' => 75,
            'status' => true,
        ]);
        DB::table('products')->insert([
            'name' => 'Jarocho',
            'description' => '3 Picadas o 3 quesadillas acompanadas con huevos revueltos',          
            'url_image' => null,
            'id_family' => 1,
            'price' => 89,
            'status' => true,
        ]);
        DB::table('products')->insert([
            'name' => 'Costeno',
            'description' => 'Chilaquiles banados en salsa roja o verde acompanados de pollo o huevos estrellados',          
            'url_image' => null,
            'id_family' => 1,
            'price' => 75,
            'status' => true,
        ]);
        DB::table('products')->insert([
            'name' => 'A tu antojo',
            'description' => '2 picadas sencillas, 2 enchiladas de mole sencillas y 1 empanada (Pollo, picadillo o queso)',          
            'url_image' => null,
            'id_family' => 1,
            'price' => 75,
            'status' => true,
        ]);
        DB::table('products')->insert([
            'name' => 'Gringo',
            'description' => 'Hotcakes orden de 4 piezas, acompanados de miel, mermelada o lechera + 1 salchicha frita',          
            'url_image' => null,
            'id_family' => 1,
            'price' => 75,
            'status' => true,
        ]);
        DB::table('products')->insert([
            'name' => 'Kids',
            'description' => 'Sincronizada de jamon con queso (americano o hebra) acompanada con pico de gallo',          
            'url_image' => null,
            'id_family' => 1,
            'price' => 65,
            'status' => true,
        ]);
        DB::table('products')->insert([
            'name' => 'Mexicano',
            'description' => 'Fajitas de res a la mexicana, o salsa de chicharron acompanadas de frijoles refritos',          
            'url_image' => null,
            'id_family' => 1,
            'price' => 98,
            'status' => true,
        ]);
    }
}
