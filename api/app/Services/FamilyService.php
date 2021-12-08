<?php

namespace App\Services;

use App\Models\Family;

/**
 *  Class for users interaction with User Model
 */
class FamilyService
{
   /**
   * all 
   */
  public function getFamilyAll()
  {
    $family = Family::all();    
    return $family;
  }

}