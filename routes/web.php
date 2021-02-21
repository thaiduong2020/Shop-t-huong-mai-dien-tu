<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;
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

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/','App\Http\Controllers\AllController@admin' )->name('admin');
    Route::get('/quan-ly-danh-muc',[
        'as' => 'Categories',
        'uses' => 'App\Http\Controllers\CategoryController@index',
    ]);
    Route::get('quan-ly-san-pham',
        [
        'as' => 'Products',
        'uses' => 'App\Http\Controllers\AllController@ADproduct',
        ]
    );

    Route::get('/quan-ly-nguoi-dung',[
        'as' => 'User',
        'uses' => 'App\Http\Controllers\CategoryController@user',

    ]);
    Route::get('/quan-ly-vai-tro',[
        'as' => 'Roles',
        'uses' => 'App\Http\Controllers\CategoryController@role',

    ]);
    Route::get('/quan-ly-don-hang',
    [
        'as' => 'bills',
        'uses' => 'App\Http\Controllers\AllController@bill',
        ]
    );
    Route::get('/quan-ly-binh-luan',
    [
        'as' => 'comment',
        'uses' => 'App\Http\Controllers\AllController@comment',
        ]
    );

});
Route::get('countdown', function () {
        return view('client.countdown');
})->name('count');

Route::get('test', function () {
    return view('client.login');
});



Route::get('/trang-chu', 'App\Http\Controllers\AllController@index')->name('home');
Route::get('/master', 'App\Http\Controllers\AllController@master');
Route::get('/khuyen-mai-hot', 'App\Http\Controllers\AllController@khuyenmai')->name('khuyenmai');
Route::get('/mua-tra-gop', 'App\Http\Controllers\AllController@tragop')->name('tragop');
Route::get('/lien-he', 'App\Http\Controllers\AllController@lienhe')->name('lienhe');
Route::get('info-products/{id}', 'App\Http\Controllers\AllController@info')->name('info-products');
Route::get('/products/{id}','App\Http\Controllers\AllController@products')->name('products');
Route::get('product', 'App\Http\Controllers\AllController@allproduct')->name('allproduct');
Route::get('/api/search/{val}', 'App\Http\Controllers\AllController@search')->name('search');
Route::get('/search', 'App\Http\Controllers\AllController@search2')->name('search2');


Route::post('/add-cart/{id}', 'App\Http\Controllers\CartController@addCart')->name('add-cart');
Route::get('/add-cart/{id}', 'App\Http\Controllers\CartController@addCart')->name('add-cart2');


Route::get('check-out', 'App\Http\Controllers\CartController@getCheckout')->name('getCheckout');
Route::post('check-out', 'App\Http\Controllers\CartController@postCheckout')->name('postCheckout');
Route::get('/delete_cart/{id}','App\Http\Controllers\CartController@deleteCart')->name('delete-cart');
Route::get('/dangnhap', function () {
    return view('client.login');
})->name('getdangnhap');
Route::post('/dangnhap','App\Http\Controllers\LoginController@login')->name('dangnhap');
Route::get('/regis', function () {
    return view('client.register');
})->name('getdangky');
Route::post('/dangky','App\Http\Controllers\LoginController@register')->name('dangky');
Route::get('/logout','App\Http\Controllers\LoginController@logout')->name('logout');
Route::post('/contact','App\Http\Controllers\AllController@contact')->name('postContact');
Route::post('/update-user/{id}','App\Http\Controllers\AllController@updateUser')->name('update-user');



Route::get('/favouriteA','App\Http\Controllers\ProductFavourite@add_fvr');
Route::get('/favouriteR','App\Http\Controllers\ProductFavourite@remove_fvr');
Route::get('/loadfavourite','App\Http\Controllers\ProductFavourite@load');
Route::get('/listfavourite','App\Http\Controllers\ProductFavourite@list')->name('listFavourite');
Auth::routes();



