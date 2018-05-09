<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class BannerController extends Controller
{
	public function ajax()
	{
		$banner = get_api_response('banner_slideshow');
		$temp = (array) $banner->data;
    	$html = "";
    	if(count($temp) > 0){    		
    		$html = view('banner.slideshow')->with(['banner' => $banner->data])->render();
    	}
    
    	return response()->json(['count' => count($temp), 'html' => $html]);
	}
}