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
        $categorys = \App\Models\Product::all()
                                        ->where('id', $categoryId);
        // return ['login' => $admin];
        return view('main', compact('categorys'));
    }
}
