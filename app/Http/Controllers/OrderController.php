<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index()
    {
        return Order::all();
    }

    public function store(Request $request)
    {
        //$articleId = new Order;
        $article = Order::create($request->all());
        $insertedId = $article->id;
        return response()->json([
            'orderId' => "$insertedId"
            ]);
    }
    // public function getId()
    // {
    //     $orederIdValue = Order::select('id')->orderBy('id', 'desc')->limit(1)->get();
    //     return $orederIdValue;
    // }

    // public function update(Request $request, $id)
    // {
    //     $article = Order::findOrFail($id);
    //     $article->update($request->all());

    //     return $article;
    // }

    // public function delete(Request $request, $id)
    // {
    //     $article = Order::findOrFail($id);
    //     $article->delete();

    //     return 204;
    // }
    
}
