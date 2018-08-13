<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class PaymentController extends CoreController
{
	function editPayment()
	{
		$checkout = get_api_response('checkout');
		if(count($checkout->data) === 0)
			return redirect('home');
		else
			return view('payment.edit_payment')->with(['transaction' => $checkout->data]);
	}

	function store_payment(Request $request)
	{
		$body = array(
			'type'	=> (int) $request->type_payment
        );

		$payment = get_api_response('payment/choose', 'POST', [], $body);
		if($payment !== 200)
			return redirect('home');
		else
			return redirect('payment/tagihan');
	}

	public function tagihan($invoce, Request $request)
	{		
		$bill = get_api_response('payment/bill/'.$invoce);
		$user_data =  $this->getUserProfile();
		if(count($bill->data) === 0)
			return redirect('home');
		else
			return view('payment.billing')->with(['user_data' => $user_data, 'bill' => $bill->data]);		
	}
}