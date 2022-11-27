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
        $products = \App\Models\Product::where('categoriId', $categoryId)
                                        ->get();

        $categorys = \App\Models\Category::all();

        $dopsResult = [];
        $dops       = [];

            foreach($products as $key => $value)
            {
                //print_r($value->id);
                $dops[] = \App\Models\DopsCategorys::join('products', 'products.id', '=', 'dops_categorys.dopProductId')
                                                    ->select('dops_categorys.*', 'products.name')
                                                    ->where('productId', $value->id)
                                                    ->get();           
            }

            foreach($dops as $value)
            {         
                foreach($value as $item)
                {
                   
                    $dopsRes = [
                        'productId'     => $item->productId,
                        'dopProductId'  => $item->dopProductId,
                        'name'          => $item->name
                    ];
                    $dopsResult[] = $dopsRes;
                }
            }      

        $categoryName = \App\Models\Category::select('name')->where('id', $categoryId)->get();

        session()->put('categoriId', "$categoryId"); 

        return view('categoryProductsAdmin', compact('categorys', 'categoryName', 'products', 'dopsResult'));
    }
}
