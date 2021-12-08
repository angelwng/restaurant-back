<?php

namespace App\Services;

use App\Models\Product;

/**
 *  Class for users interaction with User Model
 */
class ProductService
{
   /**
   * all 
   */
  public function getProductsAll()
  {
    $product = Product::all();    
    return $product;
  }
   /**
   * CreateProduct 
   */
  public function postProduct($data)
  {
    
    $product = Product::create(
      [
        'name' => strtolower($data['nombre']),
        'description' => strtolower($data['descripcion']),
        'url_image' => ($data['imagen'] ?$data['imagen'] :null ),
        'id_family' => ($data['familia']),
        'price' =>($data['precio']), 
        'status' => true, 
        
      ]
    );    
    return $product;
  }

}