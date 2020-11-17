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
    return view('client.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
    
});

  
    Route::get('info-products/{id}', function(){
        return view('client.info-product');
    })->name('info-products');







