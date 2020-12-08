<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        return Product::all();
    }

    public function store(ProductRequest $requestForm)
    {
        $categoryId  = $requestForm->input('categoryId');
        $name        = $requestForm->input('name');
        $price       = $requestForm->input('price');
        $description = $requestForm->input('description');
        $image       = $requestForm->file('img')->store('uploads', 'public');


        Product::create([
            'categoriId'  => $categoryId,
            'name'        => "$name",
            'price'       => $price,
            'description' => "$description",
            'image'       => "$image",
        ]);

        return redirect()->to("/admin/category/{$categoryId}");
    }

    public function update(ProductRequest $requestForm)
    {
        $productId  = $requestForm->input('productEditId');
        $categoryId = session()->get('categoriId');

        //dd(session()->all());

        $article = Product::findOrFail($productId);
        $article->update($requestForm->all());

        return redirect()->to("/admin/category/{$categoryId}");
    }

    public function delete(Request $request, $id)
    {
        $article = Product::findOrFail($id);
        $article->delete();

        return 204;
    }
}
