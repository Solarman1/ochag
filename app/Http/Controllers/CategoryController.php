<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategorRequest;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    private function saveAndResize($image)
    {
        $img = Image::make($image->getRealPath());
        $img->resize(500,300);
        $imageName  = $image->getClientOriginalName();

        //$pathToSave = public_path('storage/categoryImages/'.$imageName);
        //dd($pathToSave);
        $pathToSave = public_path('storage\categoryImages\\'.$imageName);
        
        $img->save($pathToSave);
    }

    public function store(CategorRequest $requestForm)
    {
        $resultRequest = $requestForm->input('categoryName');
        $image         = $requestForm->file('img');

        //dd($image);

        $imageName  = $image->getClientOriginalName();
        $pathToDb   = "$imageName";

        $this->saveAndResize($image);

        Category::create(['name' => "$resultRequest", 'image' => "$pathToDb"]);
        //dd('this');
        return redirect()->route('admin');
    }

    public function update(CategorRequest $requestForm)
    {
        $categoryId = $requestForm->input('categoryId');
        $image      = $requestForm->file('img');
        //dd($requestForm->all());
        $article = Category::findOrFail($categoryId);

        $categoryName = $requestForm->input('categoryName');

     
        if($requestForm->has('img')){
            $image      = $requestForm->file('img');
            $imageName  = $image->getClientOriginalName();
            $oldImage   = $requestForm->input('imgEditHidden');
            
            $pathToDb   = "$imageName";

            Storage::disk('category')->delete("$oldImage");

            $this->saveAndResize($image);

            $article = Category::findOrFail($categoryId);
            $article->update([
                'id'   => $categoryId,
                'name' => $categoryName,
                'image'=> $pathToDb
            ]);  
        }
        else
            {
                $article = Category::findOrFail($categoryId);
                $article->update([
                    'id'   => $categoryId,
                    'name' => $categoryName,
                ]);  
            }

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
