<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }
}