<?php

namespace App\Http\Controllers;


use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Get Familys

    protected $product;

  public function __construct(ProductService $product)
  {
    $this->product = $product;
  }
  protected $validationRules = [
    'name' => 'required|string',
    'description' => 'required|string',
    'url' => 'required|string',
    'family' => 'required|string',
    'price' => 'required|string',
    
  ];

    public function getAll(){
        try {
            $result = $this->product->getProductsAll();
            return $this->respondOkCORS($result);
          } catch (\Exception $e) {
            return $this->respondWithError($e->getMessage());
            
          }
    }

    function create(Request $request)
    {
        try {
            if($request->has('imagen'))
               $input['imagen'] = $this->cargarFoto($request->imagen);
            $this->product->postProduct($request->all());
            return $this->respondOk('Producto creado correctamente');
        } catch (\Exception $e) {
            return $this->respondWithError($e->getMessage());
        }
    }


    public function cargarFoto($file){
      $nombreArchivo = time() . "." . $file->getClientOriginalExtension();
      $file->move(base_path('/public/imagenes'),$nombreArchivo);
      return $nombreArchivo;
    }
    
}
