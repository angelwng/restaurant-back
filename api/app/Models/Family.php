<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
  

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'familys';
    protected $fillable = [
        'name',
        'description',
        'status',
    ];

}
