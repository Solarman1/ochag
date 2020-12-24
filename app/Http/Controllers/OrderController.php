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
        // $dataToDB = [
        //     'customerName'  =>  $request->input('data.name'),
        //     'customerPhone' =>  $request->input('data.phone'),
        //     'customerEmail' =>  $request->input('data.email'),
        //     'customerAdres' =>  $request->input('data.adres'),
        //     'deliveryTime'  =>  $request->input('data.deliveryTime'),
        //     'paymentType'   =>  $request->input('data.paymentInfo'),
        //     'personsCount'  =>  $request->input('data.personsCount'),
        //     'sdacha'        =>  $request->input('data.sdacha'),
        //     'description'   =>  $request->input('data.description'),
        //     'totalPrice'    =>  1,
        // ];
        //dd($result);
        $article = Order::create($request->all());
        
        return response()->json($article, 201);
    }

    public function update(Request $request, $id)
    {
        $article = Order::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Order::findOrFail($id);
        $article->delete();

        return 204;
    }
    
}
