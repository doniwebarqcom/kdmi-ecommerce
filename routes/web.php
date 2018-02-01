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

Route::get('/', 'HomeController@index');
Route::get('home',[
    'as' 	=> 'home',
    'uses' 	=> 'HomeController@index'
]);

// Routing Menu Products
Route::get('register', 'RegisterController@index');
Route::post('register', 'RegisterController@storeData');

Route::get('login', ['as' => 'login', 'uses' => 'AuthController@login']);
Route::post('login', 'AuthController@cek_login');
Route::get('logout', 'AuthController@logout');

Route::get('tes', 'TestController@index');

Route::get('place/pos', 'PlaceController@pos');
Route::get('place/regency', 'PlaceController@regency');

Route::post('image/upload', 'ImageController@upload');

Route::get('koprasi/register', ['as'=> 'register-koprasi', 'uses' => 'KoprasiController@register']);
Route::post('koprasi/register', 'KoprasiController@store');

Route::get('product-add', ['as' => 'product-add', 'uses' => 'ProductController@add']);


