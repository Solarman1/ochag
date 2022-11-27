<?php

namespace App\Http\Controllers\AdminPages;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminProductsController extends Controller
{
    //
    public function getProducts($categoryId)
    {
        $products = \App\Models\Product::all()
                                        ->where('categoriId', $categoryId);

        $res = json_encode($products);
        // return ['login' => $admin];
        return $res;
    }
}
