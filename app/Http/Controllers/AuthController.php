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
        return view('auth.login');
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

		if ($validator->fails()){
            return view('auth.login', ['message_error' => $validator->errors()->all()]);
        }            

		$data_post = [
			'email' 	=> $request->email,
			'password' 	=> $request->password
		];

		$response = get_api_response('member/login', 'POST', [], $data_post);
		$code = $response->code;
		$message = $response->message;
		$error = $response->error;
		if($code != 200 OR $error)
        	return view('auth.login', ['message_error' => $message]);

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

    public function generaCode(Request $request)
    {
        $data_post = [
            'phone'     => $request->phone
        ];

        $response = get_api_response('member/login/phone', 'POST', [], $data_post);
        echo json_encode((array) $response);
    }

    public function sendCode(Request $request)
    {
        $data_post = [
            'phone'     => $request->phone,
            'code'      => $request->code,            
        ];

        $response = get_api_response('cek/code/register', 'POST', [], $data_post);
        $response->code;
        $member = "";
        if($response->code == 200 AND $response->data->member){
            Session::put('token', $response->meta->token);
            $member = $response->data->member;
        }
        
        echo json_encode(['status' => $response->code , 'member' => $member]);
    }

    public function registerPhone(Request $request)
    {
        $data_post = [
            'phone'     => $request->phone_send,
            'code'      => $request->code_send,           
            'password'  => $request->password_phone
        ];

        $response = get_api_response('register/user/byphone', 'POST', [], $data_post);
        
        $code = $response->code;
        $message = $response->message;
        $error = $response->error;
        if($code != 200 OR $error)
            return view('auth.login', ['message_error' => $message]);

        Session::put('token', $response->meta->token);
        $page = $request->cookie('page');
        if(is_null($page))
            $page = 'home';

        return redirect()->route($page);
    }
}