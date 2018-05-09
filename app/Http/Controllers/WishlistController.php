<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends CoreController
{
	public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index(Request $request)
    {
        $body = [
            'page'  => $request->page ? $request->page : 1
        ];

        $user_data =  $this->getUserProfile();
        $wishlist =  get_api_response('wishlist', 'GET', [], $body);
        $category =  get_api_response('category');
        $categoryInSearch =  get_api_response('category-insearch');

        $breadcrumb = array(
            array("name" => 'Home', 'url' => 'home'),
            array("name" => 'Wishlist', 'url' => '#'),
        );
        
        return view('wishlist.list', ['categoryInSearch' => $categoryInSearch->data, 'user_data' => $user_data, 'category' => $category->data, 'breadcrumb' => $breadcrumb, 'wishlist' => $wishlist->data, 'paginator' => $wishlist->pagging]);
    }

    public function destroy(Request $request)
    {
        $data_post = [
            'id'   => $request->id
        ];

        $response = get_api_response('wishlist', 'DELETE', [], $data_post);

        return response()->json($response->code);
    }

    public function add(Request $request)
    {
        $data_post = [
            'id'   => $request->id
        ];

        $response = get_api_response('wishlist', 'POST', [], $data_post);

        return response()->json($response->code);
    }
}