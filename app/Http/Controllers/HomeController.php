<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
    	$category =  get_api_response('category');
    	$categoryInSearch =  get_api_response('category-insearch');
        return view('welcome', ['categoryInSearch' => $categoryInSearch->data, 'category' => $category->data]);
    }
}