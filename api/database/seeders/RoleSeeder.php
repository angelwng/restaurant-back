<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            'name' => 'Cajeros',
            'status' => true,
        ]);
        DB::table('roles')->insert([
            'name' => 'Administrador',
            'status' => true,
        ]);
        DB::table('roles')->insert([
            'name' => 'Propietario',
            'status' => true,
        ]);
    }
}
