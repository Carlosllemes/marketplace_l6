<?php

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

Auth::routes();
Route::get('/', function () {return view('welcome');});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{slug}', 'HomeController@single')->name('product.single');

Route::prefix('cart')->name('cart.')->namespace('Cart')->group(function (){
   Route::resource('cart', 'CartController');
});

Route::group(['middleware' => ['auth']], function(){
    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function (){
        Route::prefix('stores')->name('stores.')->group(function (){
            Route::get('/', 'StoreController@index')->name('index');
            Route::get('/create', 'StoreController@create')->name('create');
            Route::post('/store', 'StoreController@store')->name('store');
            Route::get('/{store}/edit', 'StoreController@edit')->name('edit');
            Route::post('/update/{store}/', 'StoreController@update')->name('update');
            Route::delete('/destroy/{store}/', 'StoreController@destroy')->name('destroy');
        });
        Route::resource('products', 'ProductController');
        Route::resource('categories', 'CategoryController');
        //gambs do ajax
        Route::get('/products/delete/{image}', 'ProductImageController@delete')->name('delete.image');
        //fim gambs ajax
    });
});



