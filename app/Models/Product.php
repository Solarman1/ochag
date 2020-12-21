<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'categoriId', 'name', 'price', 'weight','description', 'image'
    ];
    //
}
