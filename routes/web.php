<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/admin', 'AdminPages\AdminController@index')->name('admin');

Route::get('/admin/category/{id}', 'AdminPages\AdminCategorysController@getCategorys');
Route::get('/admin/products/{id}', 'AdminPages\AdminProductsController@getProducts');


Route::post('/category', 'CategoryController@store');
Route::post('/deleteCategory', 'CategoryController@delete');
Route::put('/category', 'CategoryController@update');

Route::post('/product', 'ProductController@store');
Route::post('/productDelete', 'ProductController@delete');
Route::put('/product', 'ProductController@update');
