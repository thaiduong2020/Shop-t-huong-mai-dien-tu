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



Route::get('test', function(){
    return view('client.products.product_2');
})->name('Products');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::prefix('admin')->group(function () {
    Route::get('/Categories', function(){
        return view('admin.categories.index');
    })->name('Categories');
    Route::get('Products', function(){
        return view('admin.product.index');
    })->name('Products');


    Route::get('/Create-new-product', function(){
        return view('admin.product.create');
    })->name('Create.product');
    Route::get('/User', function(){
        return view('admin.users.index');
    })->name('User');
    
});

  
Route::get('/trang-chu', 'App\Http\Controllers\ProductController@index')->name('home');
Route::get('/master', 'App\Http\Controllers\ProductController@master');

Route::get('info-products/{id}', 'App\Http\Controllers\ProductController@info')->name('info-products');
Route::get('/products/{id}','App\Http\Controllers\ProductController@products')->name('products');

Route::post('/add-cart/{id}', 'App\Http\Controllers\CartController@addCart')->name('add-cart');
Route::get('/add-cart/{id}', 'App\Http\Controllers\CartController@addCart')->name('add-cart2');

    
Route::get('check-out', 'App\Http\Controllers\CartController@getCheckout')->name('getCheckout');
Route::post('check-out', 'App\Http\Controllers\CartController@postCheckout')->name('postCheckout');
Route::get('/delete_cart/{id}','App\Http\Controllers\CartController@deleteCart')->name('delete-cart');
Route::post('/dangnhap','App\Http\Controllers\LoginController@login')->name('dangnhap');
Route::get('/logout','App\Http\Controllers\LoginController@logout')->name('logout');





Auth::routes();



