<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategorRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function store(CategorRequest $requestForm)
    {
        $resultRequest = $requestForm->input('categoryName');
        Category::create(['name' => "$resultRequest"]);
        //dd('this');
        return redirect()->route('admin');
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
