<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'url_image',
        'id_family',
        'price',
        'status',
    ];

}
