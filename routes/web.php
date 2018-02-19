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
Route::post('generate/code', 'AuthController@generaCode');
Route::post('send/code/register', 'AuthController@sendCode');
Route::post('registration/phone/completed', 'AuthController@registerPhone');

Route::get('tes', 'TestController@index');

Route::get('place/regency', 'PlaceController@regency');
Route::get('place/district', 'PlaceController@district');
Route::get('place/village', 'PlaceController@village');
Route::get('place/pos', 'PlaceController@pos');

Route::post('image/upload', 'ImageController@upload');
Route::post('image/mandiri', 'ImageController@mandiri');

Route::get('koprasi/register', ['as'=> 'register-koprasi', 'uses' => 'KoprasiController@register']);
Route::post('koprasi/register', 'KoprasiController@store');

Route::get('product-add', ['as' => 'product-add', 'uses' => 'ProductController@add']);
Route::post('koprasi/product/add', ['as' => 'product-store', 'uses' => 'ProductController@store']);
Route::get('category/ajax', ['as' => 'ajax-category', 'uses' => 'ProductController@getAjaxCategory']);
Route::get('product/succes-upload', ['as' => 'product-succes-input', 'uses' => 'ProductController@succesStore']);
Route::get('criteria', ['uses' => 'ProductController@criteria']);

Route::get('dropshiper/register', ['as' => 'dropshiper-register','uses' => 'DropshiperController@register']);
Route::get('dropshiper/register/succes', ['as' => 'succes-register-dropshier','uses' => 'DropshiperController@succes']);
Route::post('dropshiper/register', ['uses' => 'DropshiperController@store']);
