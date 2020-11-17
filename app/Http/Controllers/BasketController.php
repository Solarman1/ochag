<?php

namespace App\Http\Controllers;

use App\Models\Basket;
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
        Basket::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = Basket::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Basket::findOrFail($id);
        $article->delete();

        return 204;
    }
}
