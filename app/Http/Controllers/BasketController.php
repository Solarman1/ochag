<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Order;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    //
    public function index()
    {
        return Basket::all();
    }

    public function store(Request $request)
    {   
        $resBasket = $request->all();
        // $orederIdValue = Order::select('id')->orderBy('id', 'desc')->limit(1)->get();
        // $idValue = 0;

        // foreach($orederIdValue as $value)
        // {
        //     $idValue = $value->id;
        // }
      
        foreach($resBasket as $item)
        {
           // $item['orderId'] = $idValue; 
            $article = Basket::create($item);
        }

        return response()->json(true, 201); 
    }

    // public function update(Request $request, $id)
    // {
    //     $article = Basket::findOrFail($id);
    //     $article->update($request->all());

    //     return $article;
    // }

    // public function delete(Request $request, $id)
    // {
    //     $article = Basket::findOrFail($id);
    //     $article->delete();

    //     return 204;
    // }
}

