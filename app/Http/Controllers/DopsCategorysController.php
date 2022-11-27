<?php

namespace App\Http\Controllers;

use App\Http\Requests\DopsRequest;
use App\Models\DopsCategorys;

class DopsCategorysController extends Controller
{
    public function getDops()
    {
        return DopsCategorys::all();
        // return DopsCategorys::where('productId', $productId)
        //                     ->get();
    }
    //
    public function store(DopsRequest $requestForm)
    {
        $productId      = $requestForm->input('productIdHidden');
        $dopsProductId  = $requestForm->input('productDopsSelector');
        $categoryId     = session()->get('categoriId');

        //die(var_dump($requestForm->input()));

        DopsCategorys::create([
            'productId'     => $productId,
            'dopProductId'  => $dopsProductId,
        ]);

        return redirect()->to("/admin/category/{$categoryId}");
    }

    public function delete(DopsRequest $requestForm)
    {
        $dopProductId   = $requestForm->input('dopProductHidden');
        $categoryId     = session()->get('categoriId');
        
        $article = DopsCategorys::where('dopProductId', '=', $dopProductId);
        
        $article->delete();
        
        return redirect()->to("/admin/category/{$categoryId}");
    }

}
