<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Cookie\CookieJar;
use Cookie;
use Validator;

class CartController extends CoreController
{
	public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function ajax_header()
    {
    	$cart = get_api_response('cart');
    	$total = 0;
    	$count = 0;    	
    	$temp = (array) $cart->data;
    	$html = "";
    	if(count($temp) > 0){
    		foreach ($cart->data as $key => $value) {
    			$total += ($value->quantity * $value->product->price);
    			$count += $value->quantity;
    		}

    		$html = view('cart.ajax_cart_header')->with(['cart' => $cart->data, 'count' => $count, 'total' => $total])->render();
    	}
    
    	return response()->json(['count' => $count, 'html' => $html]);
    }

    public function store(Request $request)
    {        
        $body = array(
            'pickup_id'         => (int) $request->pickup_id,
            'product'           => (int) $request->product,
            'quantity'          => (int) $request->quantity,
            'shipping'          => (int) $request->shipping
        );

        $response = get_api_response('cart/store', 'POST', [], $body);
        return response()->json($response);
    }

    public function list()
    {
        $cart = get_api_response('cart');
        $user_data =  $this->getUserProfile();
        return view('product.cart', ['cart' => $cart->data, 'user_data' => $user_data]);
    }

    public function ajax_update(Request $request)
    {
        $body = array(
            'cart_id'         => (int) $request->cart_id,
            'quantity'           => (int) $request->quantity
        );

        $response = get_api_response('cart/update', 'POST', [], $body);
        return response()->json($response->data);
    }

    public function ajax_cart()
    {
        $cart = get_api_response('cart');
        $returnHTML = view('cart.ajax_cart_view')->with('cart', $cart->data)->render();
        return response()->json(array('success' => true, 'html'=>$returnHTML));
    }

    public function destroy_cart(Request $request)
    {
        $delete_cart = get_api_response('cart/'.$request->id, 'DELETE');
        $cart = get_api_response('cart');
        $returnHTML = view('cart.ajax_cart_view')->with('cart', $cart->data)->render();
        return response()->json(array('success' => true, 'html'=>$returnHTML));
    }

    public function storeWithNewPlace(Request $request)
    {
        $body = array(
            'place_name'        => $request->place_alias,
            'recipient_name'    =>  $request->recipient_name,
            'recipient_number'  =>  $request->recipient_number,
            'postal_code'       =>  $request->postal_code_new,
            'district'          =>  $request->district_new,
            'addres'            =>  $request->alamat_detail,
            'product'           => (int) $request->product,
            'quantity'          => (int) $request->quantity,
            'shipping'          => (int) $request->shipping
        );

        $response = get_api_response('cart/store/withNewPlace', 'POST', [], $body);
        return response()->json($response);
    }
}