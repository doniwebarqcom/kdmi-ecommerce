<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Cookie\CookieJar;
use Cookie;
use Validator;

class ProductController extends CoreController
{
	public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function add(Request $request, CookieJar $cookieJar)
    {
    	$user_data =  $this->getUserProfile();
    	if( ! (isset($user_data) AND count($user_data) > 1)){
    		$cookieJar->queue(cookie('page', 'product-add', 60));
    		return redirect()->route('login')->with('message_error', 'Anda harus login terlebih dahulu untuk menambah product');
    	}

        if( ! ($user_data['have_shop'] == 1 OR isset($user_data['shop'])))
            return redirect()->route('register-koprasi')->with('message_error', 'Anda belum mempunyai koprasi sendiri');
        
        return view('koprasi.add_product');
    }
}