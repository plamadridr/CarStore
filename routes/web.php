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

Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('/products', function(){
    $list = App\Product::all();
    return view('listProducts', array('listProducts'=>$list));
});*/

/*
Route::get('/products/create', function(){
    $brands = App\Brand::all();
    return view('addProduct', array('brands'=>$brands));
});

*/

Route::get('/product/{id}', function ($id) {
    return App\Product::find($id)->brand;
});

Route::get('/brand/{id}', function ($id) {
    return App\Brand::find($id)->products;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products','ProductController@index');

Route::get('/products/paginate','ProductController@llistar');

Route::get('/products/create','ProductController@create');

Route::post('/productaction','ProductController@insertProduct');

Route::get('/products/update/{id}','ProductController@update');

Route::post('/productupdateaction','ProductController@updateProduct');

Route::get('/product/delete/{id}', 'ProductController@deleteProduct');
