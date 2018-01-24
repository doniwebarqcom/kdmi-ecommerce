<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoreController extends Controller
{
	protected $request;

	function __construct(Request $request)
	{
		$this->request = $request;
	}

	public function getUserProfile()
	{
		$data = $this->request->session()->all();
		$token = isset($data['token']) ? $data['token'] : false;
		
		if(! $token)
			return [];

		$header = [
			'authorization'	=> 'Bearer '.$token
		];

		$response = get_api_response('user/info', 'GET', $header);
		$data = (array) $response->data;
		if(count($data) > 1)
			$this->request->session()->put('token', $response->meta->token);

		return $data;
	}	
}