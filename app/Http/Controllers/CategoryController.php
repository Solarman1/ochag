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

    public function update(CategorRequest $requestForm)
    {
        $categoryId = $requestForm->input('categoryId');
        //dd($requestForm->all());
        $article = Category::findOrFail($categoryId);

        $categoryName = $requestForm->input('categoryName');

        $article->update([
            'id'   => $categoryId,
            'name' => $categoryName
        ]);

        return redirect()->route('admin');
    }

    public function delete(Request $request)
    {
        $categoryId = $request->input('categoryId');

        $article = Category::findOrFail($categoryId);
        $article->delete();

        return redirect()->route('admin');
    }
    
}
