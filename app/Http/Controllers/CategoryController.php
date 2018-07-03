<?php
namespace App\Http\Controllers;

use Kodami\Models\Mysql\Category;
use Illuminate\Http\Request;

class CategoryController extends CoreController
{
    public function ajax(Request $request)
    {
    	$categoryInSearch =  get_api_response('category-insearch');    	
    	$html = "";
    	$html2 = "";
    	if(count($categoryInSearch->data) > 0){
    		$html = view('category.ajax')->with(['categoryInSearch' => $categoryInSearch->data])->render();
    	}

        return response()->json(['count' => count($categoryInSearch->data), 'category1' => $html]);
    }
}