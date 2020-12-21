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
        Order::create($request->all());
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
