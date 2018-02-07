<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Cookie\CookieJar;
use Cookie;
use Validator;

class ProductController extends CoreController
{
	public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function add(Request $request, CookieJar $cookieJar)
    {
    	$user_data =  $this->getUserProfile();
    	if( ! (isset($user_data) AND count($user_data) > 1)){
    		$cookieJar->queue(cookie('page', 'product-add', 60));
    		return redirect()->route('login')->with('message_error', 'Anda harus login terlebih dahulu untuk menambah product');
    	}

        if( ! ($user_data['have_shop'] == 1 OR isset($user_data['shop'])))
            return redirect()->route('register-koprasi')->with('message_error', 'Anda belum mempunyai koprasi sendiri');        

        return view('koprasi.add_product', ['user_data' => $user_data]);
    }

    public function store(Request $request)
    {
        
        $description = $request->deskripsi;
        $price = str_replace(",", "", $request->harga_barang);
        $weight = str_replace(",", "", $request->berat_barang);
        $stock = str_replace(",", "", $request->stok);
        $new = ($request->cond == 'baru' ?  true : false);
        $avaible = ($request->status == 1 ?  true : false);
        $upload = ( count($request->upload) > 0 ? $request->upload : []);
        $abort = ( count($request->abbort) > 0 ? $request->abbort : []);
        $category1 = $request->category;
        $category2 = $request->category2;
        $category3 = $request->category3;
        $minumin = $request->minumin;
        $nama_barang = $request->nama_barang;
        $real_upload = array_diff($upload, $abort);
        $primary_image = reset($real_upload);        
        $category = (isset($category3) ? $category3 : (isset($category2) ?  $category2 : $category1));
        array_shift($real_upload);
        
        $body = array(            
            'category'      => (int) $category,
            'name'          => $nama_barang,
            'description'   => $description,
            'price'         => (int) $price,
            'primary_image' => $primary_image,
            'avaible'       => $avaible,
            'weight'        => (int) $weight,
            'stock'         => (int) $stock,
            'new'           => $new,
            'images'        => $real_upload
        );
        
        $response = get_api_response('product/input', 'POST', [], $body);
        if($response->code == 200)
            return redirect()->route('product-succes-input');
        else
            return redirect()->route('product-add')->with('message_error', 'gagal dalam menyimpan silahkan ulangi');
    }

    public function getAjaxCategory()
    {
        $category =  get_api_response('category');
        $cat = [];

        foreach ($category->data as $key => $value) {
            $cat['parent_0'][$key] =  $this->generateData($value);
            if(isset($value->subcategory))
            {
                foreach ($value->subcategory as $subkey1 => $subvalue1) {
                    $cat['parent_'.$value->id][$subkey1] =  $this->generateData($subvalue1);
                    if(isset($subvalue1->subcategory))
                    {
                        foreach ($subvalue1->subcategory as $subkey2 => $subvalue2) {
                            $cat['parent_'.$subvalue1->id][$subkey2] =  $this->generateData($subvalue2);
                        }
                    }
                }
            }
        }

        echo json_encode($cat);
    }

    public function succesStore()
    {
        $user_data =  $this->getUserProfile();
        if( ! (isset($user_data) AND count($user_data) > 1)){
            $cookieJar->queue(cookie('page', 'product-add', 60));
            return redirect()->route('login')->with('message_error', 'Anda harus login terlebih dahulu untuk menambah product');
        }

        if( ! ($user_data['have_shop'] == 1 OR isset($user_data['shop'])))
            return redirect()->route('register-koprasi')->with('message_error', 'Anda belum mempunyai koprasi sendiri');        
               
        return view('koprasi.succes_upload', ['user_data' => $user_data]);
    }

    function generateData($value)
    {
        $data['id'] = $value->id;
        $data['name'] = $value->name;
        $data['order_num'] = $value->order_num;
        $data['slug'] = $value->slug;
        $data['permalink'] = $value->permalink;
        $data['description'] = $value->description;
        $data['image'] = $value->image;
        return $data;
    }
}