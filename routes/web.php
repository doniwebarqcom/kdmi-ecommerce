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

Route::get('category/getDataAjax', ['as' => 'data-category-ajax', 'uses' => 'CategoryController@ajax']);
Route::get('u/data', ['as' => 'user-data-ajax-menu', 'uses' => 'UserController@ajaxDataMenu']);

Route::get('user/dana/simpanan_anggota', ['as' => 'dana-simpanan-anggota', 'uses' => 'UserController@dana_simpanan_anggota'])->middleware('auth.member');

Route::get('pending/top-up', ['as' => 'data-category-ajax', 'uses' => 'UserController@pending_top_up'])->middleware('auth.member');
Route::get('isi/saldo')->uses('UserController@isi_saldo')->name('isi-saldo')->middleware('auth.member');
Route::post('isi/saldo')->uses('UserController@store_isi_saldo')->name('isi-saldo-post')->middleware('auth.member');
Route::get('top-up/saldo/{transaction_code}')->uses('UserController@top_up')->name('top-up-saldo')->middleware('auth.member');

Route::get('product/ajax/search', ['as' => 'product-search-ajax', 'uses' => 'ProductController@ajaxSearch']);

Route::get('dashboard')->uses('HomeController@dashboard');

Route::get('product/not_found')->uses('ProductController@not_found');
Route::get('suggest/product')->uses('ProductController@suggest');
Route::get('ajax/get-pulsa', 'AjaxController@getPulsaGet');

Route::get('tes', 'TestController@index');
Route::get('register', 'RegisterController@index');
Route::post('register', 'RegisterController@storeData');
Route::get('banner')->uses('BannerController@ajax');

Route::get('wishlist')->uses('WishlistController@index')->name('wishlist')->middleware('auth.member');
Route::get('wishlist/add')->uses('WishlistController@add')->name('wishlist-add')->middleware('auth.member');
Route::delete('wishlist')->uses('WishlistController@destroy')->name('wishlist-destroy')->middleware('auth.member');

Route::get('k/{category}')->uses('ProductController@search');

Route::get('login', ['as' => 'login', 'uses' => 'AuthController@login']);
Route::get('before-login', ['as' => 'login', 'uses' => 'AuthController@before_login']);
Route::post('login', 'AuthController@cek_login');
Route::post('login/anggota', 'AuthController@cek_login_anggota');
Route::get('logout', 'AuthController@logout');
Route::post('generate/code', 'AuthController@generaCode');
Route::post('send/code/register', 'AuthController@sendCode');
Route::post('registration/phone/completed')->uses('AuthController@registerPhone');

Route::post('get/shipping')->uses('ShippingController@getData');

Route::get('checkout')->uses('CheckoutController@index')->name('checkout')->middleware('auth.member');

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

Route::get('koprasi/{url_koprasi}/product/validated', 'KoprasiController@validated_product')->middleware('have.shop');

Route::get('transaction/list', 'UserController@list_trasaction')->middleware('auth.member');
Route::get('payment/invoices/{invoce}', 'PaymentController@tagihan')->middleware('auth.member');

Route::get('profile', 'UserController@profile')->middleware('auth.member');
Route::get('profile/edit', 'UserController@edit')->middleware('auth.member');
Route::get('profile/place/list', 'UserController@place_list')->middleware('auth.member');
Route::get('my-account', 'UserController@account')->middleware('auth.member');
Route::get('people/{id}/edit', 'UserController@edit')->middleware('auth.member');
Route::get('account/ajax/place/list', 'UserController@ajax_place_list');
Route::get('account/get/place', 'UserController@get_place')->middleware('auth.member');
Route::post('account/edit/image', 'UserController@upload_image')->middleware('auth.member');
Route::post('account/profile/store', 'UserController@store_profile')->middleware('auth.member');
Route::post('account/place', 'UserController@store_place')->middleware('auth.member');
Route::put('account/place', 'UserController@put_place')->middleware('auth.member');
Route::delete('account/place', 'UserController@destroy_place')->middleware('auth.member');

Route::get('product/{product}')->uses('ProductController@getDetail');
Route::get('product/{product}/add-cart')->uses('ProductController@add_cart')->middleware('auth.member');
Route::post('product/{product}/ajax-update-cart')->uses('ProductController@ajax_update_cart')->middleware('auth.member');

Route::get('cart')->uses('CartController@list')->name('cart')->middleware('auth.member');
Route::get('cart/ajax-cart')->uses('CartController@ajax_cart')->middleware('auth.member');
Route::get('cart/ajax-cart-header')->uses('CartController@ajax_header');
Route::delete('cart/ajax-cart')->uses('CartController@destroy_cart')->middleware('auth.member');
Route::put('cart/ajax')->uses('CartController@ajax_update')->middleware('auth.member');
Route::post('cart/store')->uses('CartController@store')->middleware('auth.member');
Route::post('cart/store/with-new-place')->uses('CartController@storeWithNewPlace')->middleware('auth.member');

Route::get('payment/edit_payment')->uses('PaymentController@editPayment')->name('edit-payment')->middleware('auth.member');
Route::get('payment/tagihan')->uses('PaymentController@tagihan')->name('edit-payment')->middleware('auth.member');
Route::post('payment/edit_payment')->uses('PaymentController@store_payment')->middleware('auth.member');

Route::get('{koprasi}/{product}', 'ProductController@getSingle');