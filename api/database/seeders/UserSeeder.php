<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Angel',
            'lastname' => 'Wong',
            'phone' => '2299361428',
            'email' => 'angeldiazwong@hotmail.com',
            'password'=>'milan15a',
            'api_token'=>'',
            'status' => true,
            'id_rol' => 3,
        ]);
    }
}
