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

Route::get('/hello', function () {
    return '<h1>Hello world!</h1>';

});

//dynamic route
Route::get('/user/{id}/{name}', function ($id, $name) {
    return "This is user id: " . $id . "Name is " . $name;
});

Route::get('/', function () {
    return view('welcome');
});

*/

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::resource('products', 'ProductsController');

Auth::routes();