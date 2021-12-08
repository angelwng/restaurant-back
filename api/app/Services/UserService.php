<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Helpers\Email;
use App\Helpers\Encrypt;



/**
 *  Class for users interaction with User Model
 */
class UserService 
{

  

  public function createUser($data){
    $user = User::create(
      [
        'name' => strtolower($data['nombre']),
        'lastname' => strtolower($data['apellido']),
        'phone' => strtolower($data['telefono']),
        'email' => strtolower($data['correo']),
        'password' => strtolower($data['contrasena']),
        'api_token' => strtolower($data['token']),
        'status' => true,
        'id_rol' => strtolower($data['rol'])
      ]
    );
  }

  
}
