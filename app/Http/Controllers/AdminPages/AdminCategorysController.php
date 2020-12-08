<?php

namespace App\Http\Controllers\AdminPages;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCategorysController extends Controller
{
    //
    public function getCategorys($categoryId)
    {
        $products = \App\Models\Product::all()
                                        ->where('id', $categoryId);

        $categorys = \App\Models\Category::all();

        return view('categoryProductsAdmin', compact('categorys', 'products'));
    }
}
