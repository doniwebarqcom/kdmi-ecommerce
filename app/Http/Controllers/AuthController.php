<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;

class AuthController extends Controller
{
    public function login()
    {
    	$category =  get_api_response('category');
    	$categoryInSearch =  get_api_response('category-insearch');
        return view('auth.login', ['categoryInSearch' => $categoryInSearch->data, 'category' => $category->data]);
    }

    public function cek_login(Request $request)
    {
    	$rules = [
                'email' 		=> 'required',
                'password' 		=> 'required'
        ];

    	$validator = Validator::make(
    		$request->all(),
    		$rules
		);

		if ($validator->fails())
			return $validator->errors()->all();


		$data_post = [
			'email' 	=> $request->email,
			'password' 	=> $request->password
		];

		$response = get_api_response('member/login', 'POST', [], $data_post);
		$code = $response->code;
		$message = $response->message;
		$error = $response->error;
		if($code != 200 OR $error){
			$category =  get_api_response('category');
    		$categoryInSearch =  get_api_response('category-insearch');
        	return view('auth.login', ['categoryInSearch' => $categoryInSearch->data, 'category' => $category->data, 'message_error' => $message]);
		}

		Session::put('token', $response->meta->token);
        $page = $request->cookie('page');
        if(is_null($page))
            $page = 'home';

		return redirect()->route($page);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('home');
    }   
}