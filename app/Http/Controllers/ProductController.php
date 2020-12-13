<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    //
    public function index()
    {
        return Product::all();
    }

    private function saveAndResize($image)
    {
        $img = Image::make($image->getRealPath());
        $img->resize(500,300);
        $imageName  = $image->getClientOriginalName();
        $pathToSave = public_path('storage\productImages\uploads\\'.$imageName);
        
        $img->save($pathToSave);
    }

    public function store(ProductRequest $requestForm)
    {
        $categoryId  = $requestForm->input('categoryId');
        $name        = $requestForm->input('name');
        $price       = $requestForm->input('price');
        $weight      = $requestForm->input('weight');
        $description = $requestForm->input('description');
        $image       = $requestForm->file('img');

        $imageName  = $image->getClientOriginalName();
        $pathToDb   = "uploads/$imageName";

        $this->saveAndResize($image);

       // $image->store('uploads', 'public');
        // $pathToSave = public_path('storage\productImages\uploads\\'.$imageName);
        // $img->save($pathToSave);
        //$img->save(public_path('/productImages/'.$imageName));
        // print_r($pathToSave);
        // die();

        Product::create([
            'categoriId'  => $categoryId,
            'name'        => "$name",
            'price'       => $price,
            'weight'      => "$weight",
            'description' => "$description",
            'image'       => "$pathToDb",
        ]);

        return redirect()->to("/admin/category/{$categoryId}");
    }

    public function update(ProductRequest $requestForm)
    {
        $productId  = $requestForm->input('productEditId');
        $categoryId = session()->get('categoriId');
        $product = new Product();
        $productImg = $requestForm->input('img');
        // print_r($requestForm->all());
        // die();

        $name        = $requestForm->input('name');
        $price       = $requestForm->input('price');
        $weight      = $requestForm->input('weight');
        $description = $requestForm->input('description');

        if ($requestForm->has('img')) {
            $image      = $requestForm->file('img');
            $imageName  = $image->getClientOriginalName();
            $oldImage   = $requestForm->input('imgEditHidden');
            $pathToDb   = "uploads/$imageName";

            Storage::delete($oldImage);
            $this->saveAndResize($image);
        } 

        $article = Product::findOrFail($productId);
        $article->update([
            'categoriId'  => $categoryId,
            'name'        => "$name",
            'price'       => $price,
            'weight'      => "$weight",
            'description' => "$description",
            'image'       => "$pathToDb",
        ]);

        return redirect()->to("/admin/category/{$categoryId}");
    }

    public function delete(Request $requestForm)
    {
        $product = new Product();

        $categoryId = session()->get('categoriId');
        $productId = $requestForm->input('productId');

        //Storage::delete($product->image);
        //dd($productId);
        $article = Product::findOrFail($productId);
        $article->delete();
        
        return redirect()->to("/admin/category/{$categoryId}");
    }
}
