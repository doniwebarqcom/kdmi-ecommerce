<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class KoprasiController extends CoreController
{
	public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index($url_koprasi, Request $request)
    {
        $user_data =  $this->getUserProfile();
        $category =  get_api_response('category');
        $categoryInSearch =  get_api_response('category-insearch');
        

        $body = [
            'page'  => $request->page ? $request->page : 1
        ];

        $list_product =  get_api_response('product/list', 'GET', [], $body);
        $breadcrumb = array(
            array("name" => 'Home', 'url' => 'home'),
            array("name" => 'Koprasi Anda', 'url' => 'koprasi/'.$user_data['shop']->url),
        );
        
        return view('koprasi.homepage', ['categoryInSearch' => $categoryInSearch->data, 'category' => $category->data, 'user_data' => $user_data, 'breadcrumb' => $breadcrumb, 'list_product' => $list_product->data, 'paginator' => $list_product->pagging, 'menu_side_bar' => 'product_koprasi']);
    }

    public function register()
    {
    	$user_data =  $this->getUserProfile();
    	$category =  get_api_response('category');
    	$categoryInSearch =  get_api_response('category-insearch');
    	$breadcrumb = array(
    		array("name" => 'Home', 'url' => 'home'),
    		array("name" => 'Register Koprasi', 'url' => 'koprasi/register'),
    	);

        return view('koprasi.register', ['categoryInSearch' => $categoryInSearch->data, 'category' => $category->data, 'user_data' => $user_data, 'breadcrumb' => $breadcrumb]);
    }

    public function store(Request $request)
    {
        $rules = [
            'nama_lengkap'  => 'required',
            'regency'       => 'required',
            'alamat_pickup' => 'required',
            'kode_pos'      => 'required'
        ];

        $validator = Validator::make(
            $request->all(),
            $rules
        );

        if ($validator->fails())
            return redirect()->route('koprasi/register');

        $body = [
            'name'              => $request->nama_lengkap,
            'url'               => str_replace(" ", "", $request->nama_lengkap),
            'pickup_address'    => $request->alamat_pickup,
            'kode_pos'          => $request->alamat_pickup,
            'postal_code'       => (int) $request->kode_pos,
            'description'       => $request->description,
            'regency'           => (int) $request->regency,
            'image'             => $request->image,
        ];

        $response = get_api_response('shop/register', 'POST', [], $body);
        if($response->code !== 200)
            return redirect()->route('register-koprasi')->with('error-message', $response->message);

        return redirect()->route('home');
    }
}