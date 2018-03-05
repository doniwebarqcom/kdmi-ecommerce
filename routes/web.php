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
Route::get('place/postal-code/district', 'PlaceController@postalcodeByDistrict');

Route::post('image/upload', 'ImageController@upload');
Route::post('image/mandiri', 'ImageController@mandiri');

Route::get('koprasi/register', ['as'=> 'register-koprasi', 'uses' => 'KoprasiController@register']);
Route::post('koprasi/register', 'KoprasiController@store');

Route::get('product-add', ['as' => 'product-add', 'uses' => 'ProductController@add'])->middleware('have.shop');
Route::post('koprasi/product/add', ['as' => 'product-store', 'uses' => 'ProductController@store'])->middleware('have.shop');
Route::get('category/ajax', ['as' => 'ajax-category', 'uses' => 'ProductController@getAjaxCategory']);
Route::get('product/succes-upload', ['as' => 'product-succes-input', 'uses' => 'ProductController@succesStore']);
Route::get('criteria', ['uses' => 'ProductController@criteria']);
Route::get('spesification', ['uses' => 'ProductController@spesification']);

Route::get('dropshiper/register', ['as' => 'dropshiper-register','uses' => 'DropshiperController@register']);
Route::get('dropshiper/register/succes', ['as' => 'succes-register-dropshier','uses' => 'DropshiperController@succes']);
Route::post('dropshiper/register', ['uses' => 'DropshiperController@store']);

Route::get('koprasi/{url_koprasi}', 'KoprasiController@index')->middleware('have.shop');

Route::get('my-account', 'UserController@account')->middleware('auth.member');
Route::get('people/{id}/edit', 'UserController@edit')->middleware('auth.member');
Route::get('my-account/place/list', 'UserController@place_list')->middleware('auth.member');
Route::get('my-account/profile', 'UserController@edit')->middleware('auth.member');
Route::get('account/get/place', 'UserController@get_place')->middleware('auth.member');
Route::post('account/edit/image', 'UserController@upload_image')->middleware('auth.member');
Route::post('account/profile/store', 'UserController@store_profile')->middleware('auth.member');
Route::post('account/place', 'UserController@store_place')->middleware('auth.member');
Route::put('account/place', 'UserController@put_place')->middleware('auth.member');
Route::delete('account/place', 'UserController@destroy_place')->middleware('auth.member');

Route::get('cart', 'ProductController@cart')->middleware('auth.member');
Route::get('product/{product}', 'ProductController@getDetail');
Route::get('product/{product}/add-cart', 'ProductController@add_cart')->middleware('auth.member');
Route::post('product/{product}/ajax-update-cart', 'ProductController@ajax_update_cart')->middleware('auth.member');
Route::get('cart/ajax-cart', 'ProductController@ajax_cart')->middleware('auth.member');
Route::delete('cart/ajax-cart', 'ProductController@destroy_cart')->middleware('auth.member');

Route::get('{koprasi}/{product}', 'ProductController@getSingle');