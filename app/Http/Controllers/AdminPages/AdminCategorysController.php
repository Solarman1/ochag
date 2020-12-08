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
                                        ->where('categoriId', $categoryId);

        $categorys = \App\Models\Category::all();

        $categoryName = \App\Models\Category::select('name')->where('id', $categoryId)->get();
        //dd($categoryName);
        session()->put('categoriId', "$categoryId"); 
       //dd(session()->all());
        //dd($products);
        return view('categoryProductsAdmin', compact('categorys', 'categoryName', 'products'));
    }
}
