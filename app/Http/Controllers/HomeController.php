<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class HomeController extends CoreController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index(Request $request)
    {
        $user_data =  $this->getUserProfile();
    	$category =  get_api_response('category');
    	$categoryInSearch =  get_api_response('category-insearch');
        return view('welcome', ['categoryInSearch' => $categoryInSearch->data, 'category' => $category->data, 'user_data' => $user_data]);
    }
}