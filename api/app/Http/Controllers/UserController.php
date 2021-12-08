<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //Get Familys

    protected $user;

  public function __construct(UserService $user)
  {
    $this->user = $user;
  }
  
  
  
  public function create(Request $request)
  {
   
      try {
        $request['contrasena'] = Hash::make($request->contrasena);
        $this->user->createUser($request->all());
          return $this->respondOk('Usuario creado correctamente');
      } catch (\Exception $e) {
          return $this->respondWithError($e->getMessage());
      }
  }


  public function authenticate(Request $request)
   {
       $this->validate($request, [
       'email' => 'required',
       'password' => 'required'
        ]);
        
      $user = User::where('email', $request->input('email'))->first();
     if(Hash::check($request->input('password'), $user->password)){
          $apikey = base64_encode(Str::random(40));
          User::where('email', $request->input('email'))->update(['api_key' => "$apikey"]);;
          return response()->json(['status' => 'success','api_key' => $apikey]);
      }else{
          return response()->json(['status' => 'fail'],401);
      }
   }



}