<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function store(Request $request)
    {
        Category::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = Category::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Category::findOrFail($id);
        $article->delete();

        return 204;
    }
    
}
