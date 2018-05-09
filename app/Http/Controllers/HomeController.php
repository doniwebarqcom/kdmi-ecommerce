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
    	$banner =  get_api_response('banner_slideshow');
        $our_product =  get_api_response('our_product');
        // $category_home_product =  get_api_response('category_home');        
     //    $most_viewed =  get_api_response('product/most-viewed');
        $ads_home =  get_api_response('ads-home');
     //    $special_offer =  get_api_response('special-offer');

        $data['categoryInSearch'] = $categoryInSearch->data;
        $data['category'] =  $category->data;
        $data['user_data'] =  $user_data;
        $data['banner'] =  $banner->data;
        $data['our_product'] =  $our_product->data;
        //$data['category_home_product'] =  $category_home_product->data;
        //$data['most_viewed'] =  $most_viewed->data;
        $data['ads_home'] =  $ads_home->data;
        //$data['special_offer'] =  $special_offer->data;
                
        return view('welcome', $data);
    }
}