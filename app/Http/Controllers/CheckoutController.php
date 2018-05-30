<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;

class CheckoutController extends Controller
{
	public function index(Request $request)
	{

		$cart = get_api_response('cart');

		
		if($cart->data === 0)
			return view('cart.empty');

		$checkout = get_api_response('checkout');

		if($checkout->code === 200)
			return redirect('payment/edit_payment');
		else
			return redirect('home');
	}
}