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
    Route::get('/Categories',[
        'as' => 'Categories',
        'uses' => 'App\Http\Controllers\CategoryController@index',
        'middleware' => 'can:category-list'
    ]);
    Route::get('Products',
        [
        'as' => 'Products',
        'uses' => 'App\Http\Controllers\ProductController@ADproduct',
        'middleware' => 'can:product-list'
        ]
    );


    Route::get('/Create-new-product',
    [
        'as' => 'Create.product',
        'uses' => 'App\Http\Controllers\ProductController@create',
        'middleware' => 'can:product-list'
        ]
    );
    Route::get('/User', function(){
        return view('admin.users.index');
    })->name('User');
    Route::get('/Roles',[
        'as' => 'Roles',
        'uses' => 'App\Http\Controllers\CategoryController@role',
        
    ]);
    Route::get('/Bills',
    [
        'as' => 'bills',
        'uses' => 'App\Http\Controllers\ProductController@bill',
        ]
    );
    
});

  




Route::get('/trang-chu', 'App\Http\Controllers\ProductController@index')->name('home');
Route::get('/master', 'App\Http\Controllers\ProductController@master');

Route::get('info-products/{id}', 'App\Http\Controllers\ProductController@info')->name('info-products');
Route::get('/products/{id}','App\Http\Controllers\ProductController@products')->name('products');
Route::get('/search/{val}', 'App\Http\Controllers\ProductController@search');

Route::post('/add-cart/{id}', 'App\Http\Controllers\CartController@addCart')->name('add-cart');
Route::get('/add-cart/{id}', 'App\Http\Controllers\CartController@addCart')->name('add-cart2');

    
Route::get('check-out', 'App\Http\Controllers\CartController@getCheckout')->name('getCheckout');
Route::post('check-out', 'App\Http\Controllers\CartController@postCheckout')->name('postCheckout');
Route::get('/delete_cart/{id}','App\Http\Controllers\CartController@deleteCart')->name('delete-cart');
Route::post('/dangnhap','App\Http\Controllers\LoginController@login')->name('dangnhap');
Route::get('/logout','App\Http\Controllers\LoginController@logout')->name('logout');

Auth::routes();



