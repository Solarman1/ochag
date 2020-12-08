<?php

namespace App\Http\Controllers\AdminPages;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
    public function index()
    {
        $categorys = \App\Models\Category::all();
        // return ['login' => $admin];
        return view('main', compact('categorys'));
    }
}
