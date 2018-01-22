<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class RegisterController extends Controller
{
    public function index()
    {
    	$category =  get_api_response('category');
    	$categoryInSearch =  get_api_response('category-insearch');
        return view('register.index', ['categoryInSearch' => $categoryInSearch->data, 'category' => $category->data]);
    }

    public function storeData(Request $request)
    {
    	$rules = [
                'nama_lengkap'	=> 'required|min:3',
                'email' 		=> 'required|email|unique:members,email',
                'password' 		=> 'required|alpha_num|min:8',
                'no_telp' 		=> 'required'
        ];

    	$validator = Validator::make(
    		$request->all(),
    		$rules
		);

		if ($validator->fails())
			return $validator->errors()->all();

		$username = str_replace(' ', '_', $request->nama_lengkap);
		$username.= date('dmyhis');
		
		$data_post['form_params'] = [
			'name' 		=> $request->nama_lengkap,
			'email' 	=> $request->email,
			'username' 	=> $username,
			'address' 	=> '',
			'phone' 	=> $request->no_telp,
			'password' 	=> $request->password
		];

		$response = (array) get_api_response('member/register', 'POST', $data_post);		

		return $response;
    }
}