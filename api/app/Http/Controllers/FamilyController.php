<?php

namespace App\Http\Controllers;

use App\Models\Family as ModelsFamily;
use App\Services\FamilyService;
use Illuminate\Http\Request;


class FamilyController extends Controller
{
    //Get Familys

    protected $family;

  public function __construct(FamilyService $family)
  {
    $this->family = $family;
  }
    public function getAll(){
        try {
            $result = $this->family->getFamilyAll();
            return $this->respondOkCORS($result);
          } catch (\Exception $e) {
            return $this->respondWithError($e->getMessage());
          }
    }


    
}
