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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


    Route::resource('categories', 'App\Http\Controllers\Api\ApiCategories');
    
    Route::resource('products', 'App\Http\Controllers\Api\ApiProducts');

    Route::resource('users', 'App\Http\Controllers\Api\ApiUserController');
    Route::resource('roles', 'App\Http\Controllers\Api\ApiRolesController');
    Route::resource('search', 'App\Http\Controllers\Api\ApiSearchController');
    Route::resource('bills', 'App\Http\Controllers\Api\ApiBillController');
    Route::resource('images', 'App\Http\Controllers\Api\ApiProductImageController');
    Route::resource('comments', 'App\Http\Controllers\Api\ApiComments');

    Route::resource('Register', 'App\Http\Controllers\Api\RegisterController');
    Route::resource('Login', 'App\Http\Controllers\Api\LoginController');