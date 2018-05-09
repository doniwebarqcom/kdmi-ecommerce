<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;

class ShippingController extends Controller
{
	public function getData(Request $request)
	{
		$data_post = [
            'product'	=> $request->product,
            'regency'	=> $request->regency,           
            'weigth'	=> $request->weigth           
        ];

        $response = get_api_response('shipping', 'POST', [], $data_post);

		return response()->json($response->data);
	}
}