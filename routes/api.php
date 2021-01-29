<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('category', 'CategoryController');
Route::apiResource('product', 'ProductController');
Route::apiResource('basket', 'BasketController');
Route::apiResource('order', 'OrderController');

Route::get('journal', 'JournalController@index');
Route::get('mailsend', 'MailSenderController@index');
Route::get('orderId', 'OrderController@getId');



    