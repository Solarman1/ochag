<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductRequest;
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
        $pathToSave = public_path('storage/productImages/uploads/'.$imageName);
        
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

        $name        = $requestForm->input('name');
        $price       = $requestForm->input('price');
        $weight      = $requestForm->input('weight');
        $description = $requestForm->input('description');

        if($requestForm->has('img')){
            $image      = $requestForm->file('img');
            $imageName  = $image->getClientOriginalName();
            $oldImage   = $requestForm->input('imgEditHidden');
            
            $pathToDb   = "uploads/$imageName";

            Storage::disk('public')->delete("$oldImage");

            $this->saveAndResize($image);
            
            $article = Product::findOrFail($productId);

            $article->update([
                'categoriId'  => $categoryId,
                'name'        => "$name",
                'price'       => $price,
                'weight'      => "$weight",
                'description' => "$description",
                'image'       => "$pathToDb",
            ]);   
        }else{
                $article = Product::findOrFail($productId);
                $article->update([
                    'categoriId'  => $categoryId,
                    'name'        => "$name",
                    'price'       => $price,
                    'weight'      => "$weight",
                    'description' => "$description",
                ]); 
            }

        
        
        return redirect()->to("/admin/category/{$categoryId}");
    }

    public function delete(Request $requestForm)
    {
        $categoryId = session()->get('categoriId');

        $productId = $requestForm->input('productId');
        //dd($productId);

        $oldImage   = $requestForm->input('imageHiddenPost');
        Storage::disk('public')->delete("$oldImage");

        $article = Product::findOrFail($productId);
        $article->delete();
        
        return redirect()->to("/admin/category/{$categoryId}");
    }
}
